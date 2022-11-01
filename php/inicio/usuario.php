<!---plantilla-->
<?php 
include('../conexion.php');
include('../lib/header.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Dependencia</title>
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
                            <img src="../../assets/images/lg.png" style="width: 140px;" alt="logo unimar">
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
                    <li class="nav-item nav-profile li_logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Salir">
                        <a href="logout.php" class="nav-link a_logout">
                            <div class="nav-profile-image">
                                <img src="../../assets/images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="mb-2"><b><?php echo $datos->nombres ?></b></span>
                                <span class="text-secondary text-small"><?php echo $datos->cargo ?></span>
                            </div>
                            <i class="fa-solid fa-person-walking-arrow-right menu-icon i_logout"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashb_usuario">
                            <span class="menu-title text-primary" style="font-size: 16px;"><b>Inicio</b></span>
                            <i class="mdi mdi-home menu-icon text-primary"></i>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title" style="font-size: 14px;"><b>Mis solicitudes</b></span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html" style="font-size: 13px;">Finalizadas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html" style="font-size: 13px;">En proceso</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h1 class="page-title">
                            <span class="page-title-icon text-white me-2" style="background: linear-gradient(117deg, rgba(0,42,155,1) 0%, rgba(0,104,255,1) 100%);">
                                <i class="mdi mdi-home"></i>
                            </span><b style="font-size: 20px;">Inicio</b>
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card" style="min-width: min-content;">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                      if (isset($_GET["msj"])) {
                                             echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                                                <strong>Su solicitud ha sido enviada!</strong> Dentro de las proximas horas sera atendida.
                                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                </div>";
                                      }
                                    ?>
                                    
                                    <form enctype="multipart/form-data" action="../vistas/crearsolicitud.php" method="POST">
                                        <div class="page-header">
                                            <h2 class="page-title" style="margin-right: 10px;"><b>Diligenciar Solicitud</b></h2>
                                            <nav aria-label="breadcrumb">
                                                <select class="form-select form-control" name="servicio" onchange="determinarVistaTipoForm(this.value);" style="width: 300px; font-size: 15px;">
                                                    <option value="0" selected>Determinar el servicio</option>
                                                    <?php
                                                    //crear una variable con la sentencia SQL
                                                    $sql = "SELECT * FROM tipo_servicio";
                                                    // crear la variable para ejecutar la consulta
                                                    $consulta = mysqli_query($conexion, $sql);
                                                    while ($campos = mysqli_fetch_array($consulta)) { ?>
                                                        <option value="<?= $campos['id_tipo_servicio']; ?>"><?= $campos['nombre_servicio']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </nav>
                                        </div>
                                        <!--enviar la id del usuario logeado-->
                                        <input type="text" id="usu" name="usu" value="<?php echo $datos->id_persona ?>" hidden>
                                        <!--end usu-->
                                        <div id="info_serv_1">
                                            <?php include('../cuestionarios_soli/servicio1.php'); ?>
                                        </div>

                                        <div id="info_serv_2">
                                            <?php include('../cuestionarios_soli/servicio2.php'); ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/usuario.js"></script>


    <?php include('../lib/footer.php') ?>
 </body>

<!---end plantilla-->