<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">

            <h3 class="text-primary"><i class="fas fa-seedling"></i>IRC</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"> <?php echo $_SESSION['nombre']; ?></h6>
                <span><?php echo $_SESSION['pri']; ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <?php
            if (isset($_GET['nav'])) {
                switch ($_GET['nav']) {
                    case 'dC':
                        echo '
                                <a href="datosCliente.php?nav=dC" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Mi perfil</a>
                    <a href="cultivos.php?nav=CU" class="nav-item nav-link"><i class="fa fa-th me-2"></i>cultivos</a>
                    <a href="camas.php?nav=CA" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>camas</a>';
                        break;
                    case 'CU':
                        echo '
                                    <a href="datosCliente.php?nav=dC" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Mi perfil</a>
                        <a href="cultivos.php?nav=CU" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>cultivos</a>
                        <a href="camas.php?nav=CA" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>camas</a>';
                        break;
                    case 'CA':
                        echo '
                                        <a href="datosCliente.php?nav=dC" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Mi perfil</a>
                            <a href="cultivos.php?nav=CU" class="nav-item nav-link"><i class="fa fa-th me-2"></i>cultivos</a>
                            <a href="camas.php?nav=CA" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>camas</a>';
                        break;
                }
            }
            ?>

        </div>
    </nav>
</div>
<!-- Sidebar End -->


<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fas fa-seedling"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Mensajes de IRC</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">IRC mando un mensaje</h6>
                                <small>aqui va tiempo</small>
                            </div>
                        </div>
                    </a>


                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">ver todos los mensajes</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificacion</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">aqui van las sugerencias</h6>
                        <small>aqui va tiempo</small>
                    </a>

                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">ver todas las notificaciones</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="datosCliente.php" class="dropdown-item">perfil</a>
                    <a href="index.php" class="dropdown-item">salir</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->