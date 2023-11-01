<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $name = $_POST['name'];
    $nif = $_POST['nif'];
    $email = $_POST['email'];
    $adress = $_POST['location'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    // Establece la conexión a la base de datos (ajusta los valores de conexión según tu configuración)
    $host = "tu_host";
    $usuario = "tu_usuario";
    $contrasena = "tu_contrasena";
    $base_datos = "tu_base_de_datos";

    $conexion = new PDO("pgsql:host=$host;dbname=$base_datos", $usuario, $contrasena);

    // Prepara la sentencia SQL de inserción
    $sentencia = $conexion->prepare("INSERT INTO COMPANY (NIF, NAME, TYPE, COUNTRY) VALUES (:nif, :nombre, :tipo, :pais)");
    $sentencia->bindParam(':nif', $nif, PDO::PARAM_STR);
    $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    $sentencia->bindParam(':pais', $pais, PDO::PARAM_STR);

    // Ejecuta la sentencia SQL de inserción
    $exito = $sentencia->execute();

    if ($exito) {
        echo "Empresa insertada exitosamente.";
    } else {
        echo "Hubo un error al insertar la empresa.";
    }

    // Cierra la conexión a la base de datos
    $conexion = null;
}
?>