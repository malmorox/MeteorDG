<?php
    include('mysql-connection.php');

    $userName = "";
    $userPassword = "";

    $errorList = [];

    if(isset($_POST['send-user'])){
        if(isset($_POST['name-user']) && $_POST['name-user'] != ""){
            $userName = $_POST['name-user'];
        } else {
            $errorList['name-user'] = "es obligatorio";
        }

        if(isset($_POST['passdword-user']) && $_POST['passdword-user'] != ""){
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

    function insertValue(){
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