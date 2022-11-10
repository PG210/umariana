<?php 
include('../conexion.php');
include('../lib/header.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<title>Director</title>
</head>
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
           <?php include('app/nav.php') ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h1 class="page-title">
                            <span class="page-title-icon text-white me-2" style="background: linear-gradient(117deg, rgba(0,42,155,1) 0%, rgba(0,104,255,1) 100%);">
                                <i class="mdi mdi-home"></i>
                            </span><b style="font-size: 20px;">Solicitudes</b>
                        </h1>
                        <!--nav-->
                        <nav aria-label="breadcrumb">
                            <ul class="nav nav-pills mb-3 back-nav" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>Enviadas</b></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">En proceso</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-confirmar-tab" data-bs-toggle="pill" data-bs-target="#pills-confirmar" type="button" role="tab" aria-controls="pills-confirmar" aria-selected="false">Confirmación</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Finalizadas</button>
                                </li>
                            </ul>
                        </nav>
                        <!--end nav-->
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                   <!---información-->
                                   <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="row">
                                            <?php
                                                if (isset($_GET["var"])) {
                                                    $men = $_GET["var"];
                                                    if($men == 1){
                                                        echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                                                        <strong>Comentario enviado!</strong>
                                                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                        </div>";
                                                    }else{
                                                        if($men == 2){
                                                            echo "<div class=\"alert alert-info alert-dismissible fade show\" role=\"alert\">
                                                                <strong>Encargado agregado de manera exitosa!</strong>
                                                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                                </div>";

                                                        }else{
                                                            echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                                            <strong>Falló el envio!</strong>
                                                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                                            </div>";
                                                        }
                                                      
                                                    }
                                                   
                                                }
                                                ?>
                                                <?php include('../vistas/solicitudesenviadas.php'); ?>
                                            </div>
                                        </div>

      
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                            <?php include('../vistas/solicitudenproceso.php'); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-confirmar" role="tabpanel" aria-labelledby="pills-confirmar-tab">
                                            <div class="row">
                                            <?php include('../vistas/confirmacion.php'); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="row">
                                            <?php include('../vistas/solicitudfinalizada.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                     
                                   <!---información-->
                                </div>
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script src="../../js/aceptar.js"></script>
    
    </body>
<!--end plantilla-->