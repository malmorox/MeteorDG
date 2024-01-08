<?php
    include '../../../src/utils/log-validator.php';

    $filledEmail = isset($_SESSION['filled-email']) ? $_SESSION['filled-email'] : '';
    $filledPassword = isset($_SESSION['filled-password']) ? $_SESSION['filled-password'] : '';

    // Limpiamos los valores después de usarlos para que no se rellenen los imputs en futuras sesiones
    unset($_SESSION['filled-email']);
    unset($_SESSION['filled-password']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeteorDG</title>
    <link rel="icon" type="image/png" href="../../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../../css/admin_view.css">
    <link rel="stylesheet" href="../../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../../css/form-css.css">
</head>
<body>
    <div class="meteordg-login-form-container">
        <div class="meteordg-login-form-content">
            <form action="" method="post" class="form-login">
                <input type="text" class="meteordg-login-fields" id="user-email" name="user-email" value="<?php echo $filledEmail; ?>" placeholder="Correo electrónico"/>
                <input type="password" class="meteordg-login-fields" id="user-passdword" name="user-passdword" value="<?php echo $filledPassword; ?>" placeholder="Contraseña"/>
                <label> <input type="checkbox" class="meteordg-authenticate-checkbox" id="password-user" name="remember-me"/> Recuérdame </label>
                <input type="submit" value="Send" class="meteordg-authenticate-buttons" id="send-user" name="login"/>
            </form>
        </div>
    </div>
</body>
</html>