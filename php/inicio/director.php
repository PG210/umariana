<?php 
include('../conexion.php');
include('../lib/header.php'); ?>
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Director</title>
</head>
<body>

    <?php session_start();

    if(isset($_SESSION['correo'])){
        $var = $_SESSION['correo'];
        $consulta = $conexion->query("SELECT persona.id_persona, persona.nombres, persona.email, persona.cargo_persona As cargo from persona WHERE persona.email = '$var'");
        $datos=$consulta->fetch_object();
    }

    ?>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href=""><img src="../../assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-logout d-none d-lg-block" style="margin-left: -18px; margin-right: -20px;">
                        <a class="nav-link btn" onclick="abrirNuevaPestaña('https://www.umariana.edu.co/')">
                            <img src="../../assets/images/lg.png" style="width: 180px;" alt="logo unimar">
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!---perfil-->
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-image">
                                <img src="../../assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><b><?php echo $datos->nombres ?></b></p>
                                <span class="text-secondary text-small">Directivo</span>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item text-black" href="#">
                                <i class="mdi mdi-cached me-2 text-warning"></i> Mi perfil </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-black" href="logout.php">
                                <i class="mdi mdi-logout me-2 text-danger"></i> Salir </a>
                        </div>
                    </li>
                    <!--end perfil-->

                    <li class="nav-item">
                        <a class="nav-link" href="dashb_usuario.php">
                            <span class="menu-title text-primary" style="font-size: 16px;"><b>Solicitudes</b></span>
                            <i class="mdi mdi-email menu-icon text-primary"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/charts/chartjs.html">
                            <span class="menu-title" style="font-size: 14px;"><b>Estadisticas</b></span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h1 class="page-title">
                            <span class="page-title-icon text-white me-2" style="background: linear-gradient(117deg, rgba(0,42,155,1) 0%, rgba(0,104,255,1) 100%);">
                                <i class="mdi mdi-email menu-icon"></i>
                            </span><b style="font-size: 20px;">Solicitudes</b>
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ul class="nav nav-pills mb-3 back-nav" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>Enviadas</b></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">En proceso</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Finalizadas</button>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <h1>enviadas
                                 <?php include('../vistas/solicitudesenviadas.php'); ?>
                                </h1>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                            <h1>en proceso</h1>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                            <h1>Finalizadas</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .back-nav {
            background-color: rgba(255, 255, 255, 0.575);
            border-radius: 20px 40px;
            font-size: 12px;
            font-weight: 100;
        }

        .back-nav .nav-link.active {
            background: rgba(3, 3, 141, 0.604);
            border-radius: 20px 40px;
            margin: 5px;
            padding: 5px;
            font-size: 14px;
            font-weight: bolder;
        }
    </style>
    <?php include('../lib/footer.php') ?>
    </body>
<!--end plantilla-->