<?php
// Conexión a la BBDD
function connectDB() {
    $servername = "51.68.47.14";
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
