<?php
    include 'DBConnect.php';
    include 'MailSender.php';

    // REGISTRO
    const MIN_RANDOM_CONFIRM_CODE = 100000;
    const MAX_RANDOM_CONFIRM_CODE = 999999;

    // Instancia global de la clase DBConnect (la llamaremos en las funciones)
    $db = DBConnect::getInstance();

    $errorList = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        // Realizamos la validación del formulario
        $validationResult = validateRegistration($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

        if ($validationResult) {
            // Registro valido, por lo que enviamos correo electrónico para verificar la cuenta
            $userMail = $_POST['email'];
            $confirmationCode = generateConfirmationCode(); // Generamos el código de confirmación

            $mail = MailSender::getInstance();
            if ($mail->sendEmail($userMail, $confirmationCode)) {
                echo "Correo electrónico de confirmación enviado con éxito.";
            } else {
                echo "Error al enviar el correo electrónico.";
            }
        } else {
            echo "Error en la validación del formulario: $validationResult";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify-registration'])) {
        $enteredCode = $_POST['confirmation-code'];

        // Comparar el código de confirmación ingresado con el almacenado en la sesión
        if ($enteredCode === $confirmationCode) {
            // Código de confirmación válido, por lo que redirigimos al usuario al inicio de sesión
            header("Location: login.php");
            exit();
        } else {
            $errorList['verification-code'] = "*El código introducido es incorrecto";
        }
    }

    function validateRegistration($name, $email, $password, $confirmPassword) {
        // Validamos que el nombre no está vacio
        if (empty($name)) {
            $errorList['register-name'] = "*El campo de nombre no debe estar vacio";
            return false;
        }
        // Validamos que el formato del correo es correcto
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorList['register-email'] = "*El email debe ser válido";
            return false;
        }
        // Validamos que las contraseñas introducidas coinciden
        if (!matchPasswords($password, $confirmPassword)) {
            $errorList['register-password'] = "*Las contraseñas deben coincidir";
            return false;
        }
        return true;
    }

    // Función para validar que la 'verificar contraseña' es identica a la contraseña metida a la hora de registrarte
    function matchPasswords($password, $confirmPassword){
        return $password === $confirmPassword;
    }

    //funcion para generar un código de confirmación aleatorio
    function generateConfirmationCode() {
        return rand(MIN_RANDOM_CONFIRM_CODE, MAX_RANDOM_CONFIRM_CODE);
    }

    // INICIO DE SESIÓN

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $userEmail = $_POST['user-email'];
        $userPassword = $_POST['user-password'];
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);

        $isUser = checkUserInDB($userEmail, $userPasswordHash);

        if ($isUser) {
            // Redireccionamos al usuario a la página en la cual estaba
            session_start();
            header('Location: index.php');
            exit();
        } else {
            $errorList['invalid-credentials'] = "*Las credenciales no son correctas";
            return false;
        }
    }


    $userName = "";
    $userPassword = "";


    // Validamos que el usuario existe en la BBDD para iniciar sesión
    function checkUserInDB($userEmail, $userPassword){
        try{
            global $db;
            $conn = $db->getConnection();

            $stmt = $conn->prepare("SELECT USER_EMAIL, PASSWORD_HASH FROM USERS WHERE USER_EMAIL = :useremail");
            $stmt->bindParam(':useremail', $userEmail);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $hashedPassword = $result['PASSWORD'];
                // Verificamos si la contraseña proporcionada coincide con el hash en la base de datos
                return password_verify($userPassword, $hashedPassword); // Devuelve true o false si coinciden o no las contraseñas
            } else {
                return false; // Usuario no encontrado
            }
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
            die();
        }
    }
?>