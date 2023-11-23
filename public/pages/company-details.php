<?php
    //require '../../src/php/company-functionality.php';
    if (isset($_GET['nif'])) {
        $companyNIF = $_GET['nif'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Company Details | MeteorDG </title>
    <link rel="icon" type="image/png" href="../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../css/admin_view.css">
    <link rel="stylesheet" href="../css/admin_nav-layout.css">
    <script src="../js/company.js" defer></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="meteordg-admin-header">
        <a class="navbar-brand ps-3" href="../index.php"> <img src="../img/logotype/Logo_MeteorDG-LIGHT.svg"> </a>
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
    <section id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="meteordg-admin-vertical-nav nav">
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Gestión
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="companies-list.php"> Empresas </a>
                                <a class="nav-link" href="bills.html"> Facturas</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><!--<i class="fas fa-book-open"></i>--></div>
                            Prueba
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><!--<i class="fas fa-chart-area"></i>--></div>
                            Prueba
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><!--<i class="fas fa-table"></i>--></div>
                            Prueba
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="meteordg-admin-content">
                <div class="meteordg-admin-company-details">
                    <div class="meteordg-company-details-container meteordg-company-info-zone">
                        <?php
                            // Mandar el NIF (de la empresa que se ha clickado) a la funcion que busca los daros en la BBDD
                            $companyDetails = getClickedCompanyDetails($companyNIF);
                            showCompanyDetails($companyDetails);
                        ?>
                    </div>
                    <div class="meteordg-company-details-container meteordg-company-transactions">


                        <?php showCompanyFlow(); ?>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MeteorDG 2023 </div>
                        <div>
                            <a href="https://github.com/malmorox/MeteorDG" target="_blank">Repositorio de GitHub</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>