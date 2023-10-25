<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "create.sql";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Recopila los datos del formulario
$name = $_POST['name'];
$NIF = $_POST['nif'];
$email = $_POST['email'];
$adress = $_POST['location'];
$country = $_POST['country'];
$phone = $_POST['phone'];


// Inserta los datos en la base de datos
$sql = "INSERT INTO COMPANY (CIF, NAME, COUNTRY, ADDRESS, PHONE, EMAIL) 
        VALUES ('$NIF', $name, $country, $adress, $phone, '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

