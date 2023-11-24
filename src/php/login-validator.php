<?php
    include('mysql-connection.php');//Conexión al archivo con la clase connectDB para connectarse a la BBDD

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
            $conn = connectDB();
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

?>