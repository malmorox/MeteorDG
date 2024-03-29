<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | MeteorDG </title>
    <link rel="icon" type="image/png" href="../../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../../css/admin_view.css">
    <link rel="stylesheet" href="../../css/admin_nav-layout.css">
    <script src="js/view_admin.js" defer></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="meteordg-admin-header">
        <a class="navbar-brand ps-3" href="../../index.html"> <img src="../../img/logotype/Logo_MeteorDG-LIGHT.svg"> </a>
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
    <section id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="meteordg-admin-vertical-nav nav">
                        <a class="nav-link" href="../../index.html">
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
                                <a class="nav-link" href="pages/bills.html"> Facturas</a>
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
            <main class="meteordg-admin-home-page meteordg-admin-content">
                <div>
                    <h1 id="meteordg-admin-title">Home</h1>
                </div>
                <div class="meteordg-admin-container" id="meteordg-admin-table-container">
                    <form action="" id="meteordg-admin-filter-formulary">
                        <h4 class="meteordg-admin-subtitle">Filter company:</h4>
                        <div id="meteordg-admin-filters-container">
                            <div class="meteordg-admin-filter-selector">
                                <label for="">Name: </label>
                                <input type="text" class="meteordg-admin-filter-text-input">
                            </div>
                            <div class="meteordg-admin-filter-selector">
                                <label for="">Origin NIF: </label>
                                <input type="text" class="meteordg-admin-filter-text-input">
                            </div>
                            <div class="meteordg-admin-filter-selector">
                                <label for="">Destination NIF: </label>
                                <input type="text" class="meteordg-admin-filter-text-input">
                            </div>
                            <div class="meteordg-admin-filter-selector">
                                <label for="">Initial date: </label>
                                <input type="date" class="meteordg-admin-filter-date-input">
                            </div>
                            <div class="meteordg-admin-filter-selector">
                                <label for="">Final date: </label>
                                <input type="date" class="meteordg-admin-filter-date-input">
                            </div>
                            <button class="meteordg-admin-buttons meteordg-admin-blue-button">Filtrar</button>
                        </div>
                    </form>
                    <div class="meteordg-admin-container" id="meteordg-admin-container-last-transactions">
                        <h4 class="meteordg-admin-subtitle">Last movements:</h4>
                        <div id="meteordg-admin-company-table">
                            <div id="meteordg-admin-header-table" class="meteordg-admin-container">
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Origin</h5>
                                    <button class="meteordg-admin-button-last-movement">
                                        <span>↑</span>
                                    </button>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Origin NIF</h5>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Transaction</h5>
                                    <button class="meteordg-admin-button-last-movement">
                                        <span>↑</span>
                                    </button>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Badge</h5>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Date</h5>
                                    <button class="meteordg-admin-button-last-movement">
                                        <span>↑</span>
                                    </button>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Destination</h5>
                                    <button class="meteordg-admin-button-last-movement">
                                        <span>↑</span>
                                    </button>
                                </div>
                                <div class="meteordg-admin-header-container-table-information">
                                    <h5 class="meteordg-admin-table-information">Destination NIF</h5>
                                </div>
                            </div>
                            <div class="meteordg-admin-container meteordg-admin-row-table">
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">BMW</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">5478SF</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">5.234.709,37</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">EUR</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">13/04/2023</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Mercedes-Benz</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">3851AV</p>
                                </div>
                            </div>
                            <div class="meteordg-admin-container meteordg-admin-row-table">
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">BBVA</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">8163HQ</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">824.1359,82</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">EUR</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">25/04/2023</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Santander</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">7024TG</p>
                                </div>
                            </div>
                            <div class="meteordg-admin-container meteordg-admin-row-table">
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">KFC</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">9415NP</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">1.628.924</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">USD</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">28/04/2023</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Burguer King</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">2680JV</p>
                                </div>
                            </div>
                            <div class="meteordg-admin-container meteordg-admin-row-table">
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Ubisoft</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">7340LD</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">246.561,36</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">USD</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">05/05/2023</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Nintendo</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">3702MW</p>
                                </div>
                            </div>
                            <div class="meteordg-admin-container meteordg-admin-row-table">
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Iberdrola</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">4836RX</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">3.274.692,31</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">EUR</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">10/05/2023</p>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <div class="meteordg-admin-field-company">
                                        <p class="meteordg-admin-name-company">Endesa</p>
                                    </div>
                                </div>
                                <div class="meteordg-admin-row-container-table-information">
                                    <p class="meteordg-admin-table-information">6415EB</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>


<?php
require '../../../src/utils/companies-functionality.php';
include '../../../src/utils/log-validator.php';
include '../../../src/controllers/session-controller.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | MeteorDG </title>
    <link rel="icon" type="image/png" href="../../img/logotype/Logo_MeteorDG.ico"/>
    <link rel="stylesheet" href="../../css/admin_view.css">
    <link rel="stylesheet" href="../../css/admin_nav-layout.css">
    <script src="../../js/company.js" defer></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="meteordg-admin-header">
        <a class="navbar-brand ps-3" href="index.php"> <img src="../../img/logotype/Logo_MeteorDG-LIGHT.svg"> </a>
        <!-- Opciones de la cuenta -->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end meteordg-admin-header-dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"><?php echo $userEmail ?>></a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Prueba</a></li>
                    <li><a class="dropdown-item" href="#!">Prueba</a></li>
                    <li><a class="dropdown-item" href="#!">Prueba</a></li>
                    <li><a class="dropdown-item" href="#!">Prueba</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!" name="log-out">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <section id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="meteordg-admin-vertical-nav nav">
                        <a class="nav-link" href="index.php">
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
                                <a class="nav-link" href="companies-list.html"> Empresas </a>
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
                <div class="meteordg-admin-companies-head">
                    <h1 class="meteordg-admin-companies-title"> List of companies </h1>
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Busca aquí..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <button class="meteordg-admin-open-popup-button" id="open-popup">+</button>
                </div>
                <div class="meteordg-admin-companies-panel">
                    <!-- <div class="meteordg-company" data-company="bmw">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="bmw">
                                 <img src="https://i.pinimg.com/originals/27/6a/97/276a970cd35a83cc71beee75cb89f382.png"/>
                                <img/>
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> BMW </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> A28713642 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="meteordg-company" data-company="kfc">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="kfc">
                                <img src="../../resources/companies-logos/Kfc_logo.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> KFC </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> B86281599 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meteordg-company" data-company="ubisoft">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="ubisoft">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Ubisoft_logo.svg/1000px-Ubisoft_logo.svg.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> Ubisoft </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> A60695814 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meteordg-company" data-company="microsoft">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="microsoft">
                                <img src="https://freepngimg.com/thumb/microsoft/28525-5-microsoft-logo-clipart.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> Microsoft </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> B78603495 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meteordg-company" data-company="crunchyroll">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="crunchyroll">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Crunchyroll_Logo.svg/1200px-Crunchyroll_Logo.svg.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> Crunchyroll </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> J86943263 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meteordg-company" data-company="intel">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="intel">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Intel_logo_2023.svg/1280px-Intel_logo_2023.svg.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> Intel </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> A28819381 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meteordg-company" data-company="lays">
                        <div class="meteordg-company-info-zone">
                            <div class="meteordg-company-logo" id="lays">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Lay%27s_logo_2019.svg/1200px-Lay%27s_logo_2019.svg.png">
                            </div>
                            <div class="meteordg-company-data-zone">
                                <div class="meteordg-company-name">
                                    <span> Lays </span>
                                </div>
                                <div class="meteordg-company-nif">
                                    <span> B83884973 </span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php showCompanies(); ?>
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
        <div class="meteordg-admin-popup" id="popup-container">
            <div class="meteordg-admin-company-register-popup" id="popup">
                <a href="#" class="meteordg-admin-close-popup-button" id="close-popup"><i class="fas fa-times"></i></a>
                <form method="post" action="../../../src/utils/companies-functionality.php">
                    <section class="meteordg-company-register first-step">
                        <h4 class="meteordg-register-title"> Registra una empresa </h4>
                        <input type="file" name="image" id="image" accept="image/*" required>
                        <input type="text" class="meteordg-register-fields" name="name" id="name" placeholder="Nombre" required/>
                        <section class="meteordg-register-cif-container">
                            <select class="meteordg-register-fields meteordg-register-country-select" name="country" id="country">
                                <option value="ESP"> ESP </option> <option value="ARG"> ARG </option>
                                <option value="FRA"> FRA </option> <option value="ITA"> ITA </option>
                                <option value="ENG"> ENG </option> <option value="DEU"> DEU </option>
                                <option value="NLD"> NLD </option> <option value="NLD"> NLD </option>
                            </select>
                            <input type="text" class="meteordg-register-fields" name="nif" id="nif" placeholder="NIF" required/>
                        </section>
                        <input type="text" class="meteordg-register-fields" name="location" id="location" placeholder="Dirección jurídica"/>
                        <section class="meteordg-register-type-container">
                            <select class="meteordg-register-fields meteordg-register-type-select" name="type" id="type">
                                <?php
                                foreach (COMPANY_TYPES as $type) {
                                    echo '<option>' . $type . '</option>';
                                }
                                ?>
                            </select>
                        </section>
                        <input type="tel" class="meteordg-register-fields" name="phone" id="phone" pattern="[0-9]{9}" maxlength="9" placeholder="Teléfono"/>
                        <input type="email" class="meteordg-register-fields" name="email" id="email" placeholder="Correo electrónico"/>
                        <input type="button" class="meteordg-register-buttons" value="INSERTAR EMPRESA" id="insert"/>
                    </section>
                </form>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
