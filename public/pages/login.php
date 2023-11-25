<?php
 include('../../src/php/login-validator.php')
 //Commit Comment
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeteorDG</title>
    <link rel="icon" type="image/png" href="../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../css/admin_view.css">
    <link rel="stylesheet" href="../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../css/admin_nav-layout.css">
    <link rel="stylesheet" href="../css/form-css.css">
</head>
<body>
    
    <header class="meteordg-admin-header">
            <a class="navbar-brand ps-3" href="index.html"> <img src="../img/logotype/Logo_MeteorDG-LIGHT.svg"> </a>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Busca aquí..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Opciones de la cuenta -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end meteordg-admin-header-dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item">email</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Prueba</a></li>
                        <li><a class="dropdown-item" href="#!">Prueba</a></li>
                        <li><a class="dropdown-item" href="#!">Prueba</a></li>
                        <li><a class="dropdown-item" href="#!">Prueba</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">cerrar sesion</a></li>   
                    </ul>
                </li>
            </ul>
    </header>

    <div class="form-container">
        <div class="form-content">
            <form action="" method="post" class="form-login">
                <input type="text" placeholder="UserName" name="name-user" id="name-user" class="text-input"/>
                <input type="password" placeholder="Password" name="passdword-user" id="password-user" class="text-input"/>
                <input type="submit" value="Send" name="send-user" id="send-user" class="send-input"/>
            </form>
        </div>
    </div>
</body>
</html>