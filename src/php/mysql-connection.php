<?php
/*
Código modificado por chatgpt para que funcione con mysql.

Asegúrate de que `$username`, `$password`, y `$dbname` estén configurados
correctamente para tu base de datos MySQL en el servidor Ubuntu.
También, considera implementar medidas de seguridad adicionales y
validación de datos según sea necesario para tu aplicación.
*/
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

?>
