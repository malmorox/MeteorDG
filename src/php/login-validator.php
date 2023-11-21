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
            insertValue($userName, $userPasswordHash);
            header("Location:session-in.html");
            die(0);
        }
    }

    //Evitar posibles inyecciones de código malicioso
    function insertValue($userName, $userPassword){
        try{
            $conn = connectDB();
            
            $consulta = $conn->prepare("INSERT INTO REGISTRADOS (NAMEUSER,PASSWRD) VALUES (:nombre,:contra)");
            $consulta->bindValue(':nombre', $userName, PDO::PARAM_STR);
            $consulta->bindValue(':nombre', $userPassword, PDO::PARAM_STR);
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
            die();
        }

    }

?>