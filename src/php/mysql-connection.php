<?php
// Conexión a la BBDD
function connectDB() {
    $servername = "localhost";
    $username = "probador";
    $password = "1234";
    $dbname = "pruebas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    return $conn;
}
?>
