<?php
    include '../../src/php/log-validator.php'; // Asegúrate de tener un archivo para validar el registro si es necesario
    include '../../src/php/sendEmail.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeteorDG - Registro</title>
    <link rel="icon" type="image/png" href="../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../css/register_view.css">
    <link rel="stylesheet" href="../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../css/form-css.css">
</head>
<body>
<div class="form-container">
    <div class="form-content">
        <form action="" method="post" class="form-register">
            <input type="text" placeholder="Nombre" name="name" id="name" class="text-input" required>
            <input type="email" placeholder="Correo Electrónico" name="email" id="email" class="text-input" required>
            <input type="password" placeholder="Contraseña" name="password" id="password" class="text-input" required>
            <input type="password" placeholder="Confirmar Contraseña" name="confirm-password" id="confirm-password" class="text-input" required>
            <input type="submit" value="Registrarse" name="register" id="register" class="send-input">
        </form>
    </div>
</div>
</body>
</html>

