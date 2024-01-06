<?php
    session_start();

    if(!isset($_SESSION['user']) || $_SESSION['user'] != 1) {
        header('Location: index.html');
        die();
    }

    if (isset($_SESSION['user'])) {
        // Si hay una sesión, almacenar el nombre de usuario y el estado de la session
        $userName = $_SESSION['user'];
        $sessionStatus = true;
    }

    // Lógica de log-out, para salir de la sesión

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-out'])) {
        session_destroy();

        // Una vez desloggeado salimos del area privada y redirigimos al usuario a la página de inicio
        header('Location: index.html');
        exit();
    }
?>