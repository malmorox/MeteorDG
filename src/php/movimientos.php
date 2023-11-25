<?php
    $servidor = "localhost";//localhost = ip del server
    $usuario = "user";
    $pswd = "contrasena";
    $baseDatos = "pruebayerror"; // ombre de la base de datos dentro del mysql

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

    if (!$conexion) {
        die("Error de conexión: ".mysqli_connect_errno());
    }

    $selectNombre = "SELECT NOMBRE FROM PERSONA";
    $resultado = mysqli_query($conexion, $selectNombre);

    while($fila = mysqli_fetch_assoc($resultado)){
        echo "Nombre: ".$fila['nombre']. "<br/>";
    }

    mysqli_close($conexion);
?>