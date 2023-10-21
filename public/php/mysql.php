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
$dbname = "nombre_de_tu_base_de_datos"; // Cambia esto al nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Recopila los datos del formulario y asegúrate de que estén limpios y escapados
$name = $conn->real_escape_string($_POST['name']);
$NIF = $conn->real_escape_string($_POST['nif']);
$email = $conn->real_escape_string($_POST['email']);
$adress = $conn->real_escape_string($_POST['location']);
$country = $conn->real_escape_string($_POST['country']);
$phone = $conn->real_escape_string($_POST['phone']);

// Inserta los datos en la base de datos usando una consulta parametrizada
$sql = "INSERT INTO COMPANY (CIF, NAME, COUNTRY, ADDRESS, PHONE, EMAIL) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $NIF, $name, $country, $adress, $phone, $email);

if ($stmt->execute()) {
    echo "Datos insertados con éxito.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
