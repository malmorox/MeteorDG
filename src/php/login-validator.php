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
        } else {
            $errorList['passdword-user'] = "es obligatorio la contraseña";
        }

        if(empty($errorList)){
            insertValue();
            header("Location:session-in.html");
            die(0);
        }
    }

    function insertValue(){
        $conn = connectDB();

        

    }

?>