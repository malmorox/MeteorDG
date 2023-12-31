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