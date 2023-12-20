<?php
    include '../../src/php/log-validator.php';

    $filledEmail = isset($_SESSION['filled-email']) ? $_SESSION['filled-email'] : '';
    $filledPassword = isset($_SESSION['filled-password']) ? $_SESSION['filled-password'] : '';

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
    <link rel="stylesheet" href="../../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../../css/form-css.css">
</head>
<body>
    <div class="form-container">
        <div class="form-content">
            <form action="" method="post" class="form-login">
                <input type="text" placeholder="UserName" name="user-email" class="text-input" id="user-email" />
                <input type="password" placeholder="Password" name="user-passdword" id="user-passdword" class="text-input"/>
                <label> <input type="checkbox" placeholder="Password" name="remember-me" id="password-user" class="text-input"/> Recuérdame </label>
                <input type="submit" value="Send" name="login" id="send-user" class="send-input"/>
            </form>
        </div>
    </div>
</body>
</html>