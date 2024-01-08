<?php
    include '../../../src/utils/log-validator.php'; // Asegúrate de tener un archivo para validar el registro si es necesario
    include '../../../src/email/MailSender.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeteorDG - Registro</title>
    <link rel="icon" type="image/png" href="../../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../css/register_view.css">
    <link rel="stylesheet" href="../../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../../css/form-css.css">
    <script src="../../js/log-functionality.js"></script>
</head>
<body>
<div class="form-container">
    <div class="form-content">
        <form action="../../src/php/log-validator.php" method="post" class="form-register">
            <input type="text" placeholder="Nombre" class="meteordg-register-fields" id="name" name="name" required>
            <input type="email" placeholder="Correo Electrónico" class="meteordg-register-fields" id="email" name="email" required>
            <input type="password" placeholder="Contraseña" class="meteordg-register-fields" id="password" name="password" required>
            <input type="password" placeholder="Confirmar Contraseña" class="meteordg-register-fields" id="confirm-password" name="confirm-password" required>
            <input type="submit" value="Registrarse" class="meteordg-authenticate-buttons" id="register" name="register">
            <?php if ($validationResult) { ?>
                <label for="confirmation-code">Código de confirmación:</label>
                <input type="text" name="confirmation-code" id="confirmation-code" required>
            <?php } ?>
        </form>
    </div>
    <div class="verification">
        <form action="">
            <input type="text" name="verify" id="verify" class="text-input" required>

        </form>
    </div>
</div>
</body>
</html>

