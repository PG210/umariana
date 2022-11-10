<!---plantilla-->
<?php 
include('../conexion.php');
include('../lib/header.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<title>Dependencia</title>
<script type="text/javascript">
        window.history.forward();
        function sinVueltaAtras(){ window.history.forward(); }
</script>
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
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
            <a class="navbar-brand brand-logo" href="https://www.umariana.edu.co/" target="_blank"><img src="../../assets/images/lg.png" style="width: 140px; height:auto;" alt="logo unimar"></a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
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
                        <a class="nav-link" href="usuario.php">
                            <span class="menu-title text-primary" style="font-size: 16px;"><b>Inicio</b></span>
                            <i class="mdi mdi-home menu-icon text-primary"></i>
                        </a>
                    </li>
                    <!---dropdown-->
                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title" style="font-size: 14px;"><b>Mis solicitudes</b></span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="solenvia.php?v=<?php echo $datos->id_persona ?>" style="font-size: 13px;">En proceso</a></li>
                                
                                <li class="nav-item"> <a class="nav-link" href="solfinalizadas.php?v=<?php echo $datos->id_persona ?>" style="font-size: 13px;">Finalizadas</a></li>
                                <li class="nav-item"> <a class="nav-link" href="solcanceladas.php?v=<?php echo $datos->id_persona ?>" style="font-size: 13px;">Canceladas</a></li> 
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                    <a href="usuario.php" style="text-decoration: none;">
                        <h1 class="page-title">
                            <span class="page-title-icon text-white me-2" style="background: linear-gradient(117deg, rgba(0,42,155,1) 0%, rgba(0,104,255,1) 100%);">
                                <i class="mdi mdi-home"></i>
                            </span><b style="font-size: 20px;">Inicio</b>
                        </h1>
                      </a>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                  <!---card-->
                                  <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="row">
                                                 <?php include('../../php/vistas/usuario/listafinalizada.php') ?>
                                            </div>
                                        </div> 
                                    </div>
                                  <!---end card-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/elimsol.js"></script>
    <?php include('../lib/footer.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 </body>
<!---end plantilla-->