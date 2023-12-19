<?php


if(!isset($_SESSION['user']) && $_SESSION['user'] != 1){
    header('Location: index.html');
    die();
}

if (isset($_SESSION['user'])) {
    // Si hay una sesión, mostrar el nombre de usuario y el enlace para cerrar sesión
    $nombreUsuario = $_SESSION['usuario'];
    $mensajeBienvenida = "¡Hola, $nombreUsuario!";
    $enlaceCerrarSesion = '<a href="logout.php">Cerrar sesión</a>';
} else {
    // Si no hay una sesión, mostrar enlaces para iniciar sesión o registrarse
    $mensajeBienvenida = "Bienvenido(a) a nuestro sitio";
    $enlaceIniciarSesion = '<a href="login.php">Iniciar sesión</a>';
    $enlaceRegistrarse = '<a href="registro.php">Registrarse</a>';
}