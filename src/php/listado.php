<?php
include('DBConnect.php');

    $conn=connectDB();

    $sql = "SELECT LOGO,NAME_COMPANY,CIF FROM COMPANY";

    $result = $conn->query($sql);

    $conn->close();
?>