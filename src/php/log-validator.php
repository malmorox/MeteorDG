<?php

    include ('DBConnect.php');
    include ('MailSender.php');

    const MIN_RANDOM_CONFIRM_CODE = 100000;
    const MAX_RANDOM_CONFIRM_CODE = 999999;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
        // Realizamos la validación del formulario
        $validationResult = validateRegistration($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm-password']);

        if ($validationResult === true) {
            // Registro valido, por lo que enviamos correo electrónico
            $userMail = $_POST['email'];
            $confirmationCode = generateConfirmationCode(); //generamos por cada  el código de confirmación

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

    function validateRegistration($name, $email, $password, $confirmPassword) {
        return true;
    }

    //funcion para generar un código de confirmación aleatorio
    function generateConfirmationCode() {
        return rand(MIN_RANDOM_CONFIRM_CODE, MAX_RANDOM_CONFIRM_CODE);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        $userName = $_POST['name-user'];
        $userPassword = $_POST['password-user'];
        $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT);

        $isUser = compareWithTable($userName, $userPasswordHash);

        if ($isUser) {
            // Verificar el código de confirmación si se proporciona
            if (isset($_POST['confirmation-code'])) {
                $confirmationCode = $_POST['confirmation-code'];

            } else {
                // Mostrar el formulario para ingresar el código de confirmación
                echo "Introduce el código de confirmación enviado a tu correo electrónico.";
                // Puedes agregar un formulario aquí para ingresar el código.
            }
        } else {
            echo "Usuario no válido.";
        }
    }


    $userName = "";
    $userPassword = "";

    $errorList = [];

    if(isset($_POST['send-user'])){
        if(isset($_POST['name-user']) && $_POST['name-user'] != ""){
            //Validar el nombre de usuario del formulario con regix
            $userName = $_POST['name-user'];
        } else {
            $errorList['name-user'] = "es obligatorio";
        }

        if(isset($_POST['passdword-user']) && $_POST['passdword-user'] != ""){
            //Validar la contraseña del formulario con regix
            $userPassword = $_POST['password-user'];
            $userPasswordHash = password_hash($userPassword, PASSWORD_DEFAULT); 
        } else {
            $errorList['passdword-user'] = "es obligatorio la contraseña";
        }

        if(empty($errorList)){
            $isUser = compareWithTable($userName, $userPasswordHash);
            if($isUser == true){
                //Ir a la página que corresponda para un usuario registrado
                session_start();
                $_SESSION['isUser'];
                header("Location:compaies-list.php");
            } else {
                //Dar mensaje de usuario no valido
                header("Location:session-in.html");
                die(0);
            }
        }
    }

    //Evitar posibles inyecciones de código malicioso
    function compareWithTable($userName, $userPassword){
        try{
            $conn = DBConnect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT password FROM registrados WHERE username = :username");
            $stmt->bindParam(':username', $userName);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $hashedPassword = $result['password'];
                // Verificar si la contraseña proporcionada coincide con el hash en la base de datos
                if (password_verify($userPassword, $hashedPassword)) {
                    return true; // Coinciden las contraseñas
                } else {
                    return false; // No coinciden las contraseñas
                }
            } else {
                return false; // Usuario no encontrado
            }
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
            die();
        }

    }
//Commit Comment
?>