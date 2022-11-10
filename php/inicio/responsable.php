<?php 
include('../conexion.php');
include('../lib/header.php');
define ('SITE_ROOT', realpath(dirname(__FILE__))); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<title>Responsable</title>
<script type="text/javascript">
        window.history.forward();
        function sinVueltaAtras(){ window.history.forward(); }
</script>
</head>
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">

    <?php session_start();

    if(isset($_SESSION['correo'])){
        $var = $_SESSION['correo'];
        $consulta = $conexion->query("SELECT persona.id_persona, persona.nombres, persona.email, persona.cargo_persona As cargo from persona WHERE persona.email = '$var'");
        $datos=$consulta->fetch_object();

        $solasig = $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                                solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                                persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                                solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                                solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.id_encargado, tipo_estado.porcentaje, solicitud.motivo_edicion, solicitud.motivo_cancelacion, solicitud.comencargado
                        from solicitud 
                        JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                        JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                        JOIN persona ON solicitud.id_solicitante = persona.id_persona
                        JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                        JOIN tipo_estado ON solicitud.id_estado_solicitud = tipo_estado.id_tipo_estado
                        WHERE solicitud.id_encargado= '$datos->id_persona' AND solicitud.id_estado_solicitud ='2'");  
                        
       $proceso = $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                        solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                        persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                        solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                        solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.id_encargado, tipo_estado.porcentaje, solicitud.motivo_edicion, solicitud.motivo_cancelacion, solicitud.comencargado, solicitud.productofinal
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                JOIN tipo_estado ON solicitud.id_estado_solicitud = tipo_estado.id_tipo_estado
                WHERE solicitud.id_encargado= '$datos->id_persona' AND solicitud.id_estado_solicitud ='5' OR solicitud.id_estado_solicitud ='6'");        
      
      $fin =  $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                    solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                    persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                    solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                    solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.id_encargado, tipo_estado.porcentaje, solicitud.motivo_edicion, solicitud.motivo_cancelacion, solicitud.comencargado, solicitud.productofinal
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                JOIN tipo_estado ON solicitud.id_estado_solicitud = tipo_estado.id_tipo_estado
                WHERE solicitud.id_encargado= '$datos->id_persona' AND solicitud.id_estado_solicitud ='7'");        
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
                        <a class="nav-link" href="responsable.php">
                            <span class="menu-title text-primary" style="font-size: 16px;"><b>Solicitudes</b></span>
                            <i class="mdi mdi-email menu-icon text-primary"></i>
                        </a>
                    </li>
                   <!-- <li class="nav-item">
                        <a class="nav-link" href="vistagraficos.php">
                            <span class="menu-title" style="font-size: 14px;"><b>Estadisticas</b></span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>-->
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <!--nav-->
                        <nav aria-label="breadcrumb">
                            <ul class="nav nav-pills mb-3 back-nav" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>Asignadas</b></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">En proceso</button>
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
                                                <!---mensajes-->
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
                                                                <strong>Datos no encontrados!</strong>
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
                                                <!--end mensajes-->
                                                <?php
                                                    $conta=1;
                                                    echo '<div class="table-responsive">
                                                            <table class="table">
                                                            <thead class="table-info text-center" >
                                                            <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Solicitud</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col" colspan="2">Acción</th>
                                                            <th scope="col">Edición</th>
                                                            <th scope="col">Confirmación</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabla1">';
                                                        while ($datosn = mysqli_fetch_object($solasig)) {
                                                        echo '<tr>
                                                                <th>'.$conta++. '</th>
                                                                <td>'.$datosn->nomsolicitud.'</td>
                                                                <td>'.$datosn->nomservicio.'</td>
                                                                <td>'.$datosn->fec.'</td>
                                                                <td> 
                                                                <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width:'.$datosn->porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div><span style="font-size:13px;">'.$datosn->porcentaje.'%</span>
                                                                </td>
                                                                <td><!--modal detalle-->
                                                                <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1'.$datosn->id.'">
                                                                    Detalle
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="modal1'.$datosn->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable ">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción De Solicitud</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <!---card-->
                                                                        <div class="content-center">
                                                                        <div class="card">
                                                                            <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Fecha Evento: '.$datosn->fecha_evento.'</li>
                                                                                <li class="list-group-item">Correo solicitante: '.$datosn->email.'</li>
                                                                                <li class="list-group-item">Nombres Solicitante: '.$datosn->nombresol.'</li>
                                                                                <li class="list-group-item">Descripción Solicitud: '.$datosn->infodes.'</li>
                                                                                <li class="list-group-item">Público Dirigido: '.$datosn->publicodir.'</li>
                                                                                <li class="list-group-item">Lugar: '.$datosn->lugar.'</li>
                                                                                <li class="list-group-item">Requerimientos: '.$datosn->reque.'</li>
                                                                                <li class="list-group-item">Asistentes: '.$datosn->asistentes.'</li>
                                                                                <li class="list-group-item">Descripción Anéxo: '.$datosn->desanexo.'</li>';
                                                                                if($datosn->archivo != " "){
                                                                                echo '<li class="list-group-item"><a href="http://localhost/umariana/php/vistas/'.$datosn->archivo.'" download="anexo">Descargar archivo</a></li>';
                                                                                }
                                                                                
                                                                                else{
                                                                                echo '<li class="list-group-item">No hay archivo</li>';
                                                                                }
                                                                                echo '</ul>
                                                                                
                                                                                <br>
                                                                                <h5 class="text-left">&nbsp;&nbsp;&nbsp;Comentarios</h5>
                                                                                <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Comentario Edición: '.$datosn->motivo_edicion.'</li>
                                                                                <li class="list-group-item">Comentario Cancelación: '.$datosn->motivo_cancelacion.'</li>
                                                                                <li class="list-group-item"> Comentario director: '.$datosn->comencargado.'</li>
                                                                                </ul>
                                                                                
                                                                            </div>
                                                                            </div>
                                                                        <!--end cards-->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <!--end modal descripcion-->
                                                                </td>
                                                                <td>
                                                                    <!--modal-->
                                                                    <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop'.$datosn->id.'">
                                                                    Comentario
                                                                    </a>
                                                            
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="staticBackdrop'.$datosn->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel1">Agregar comentario al usuario</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form  method="POST" action="http://localhost/umariana/php/vistas/responsable/comentariosol.php">
                                                                            <div class="mb-3">
                                                                                <textarea class="form-control" id="comensol" name="comensol" rows="3"></textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                            </div>
                                                                            <input type="text" name="idsolicitud" id="idsolicitud" value="'.$datosn->id.'" hidden>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                                <button type="submit" class="btn btn-info">Enviar</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <!--end modal-->
                                                                </td>
                                                                <td class="text-center">
                                                                  <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editar'.$datosn->id.'" title="Enviar comentario de ajuste">
                                                                    <i class="fas fa-edit" style="color: #3942FF; font-size:20px;"></i>
                                                                  </a>
                                                                  <!-- editar -->
                                                                  <div class="modal fade" id="editar'.$datosn->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Comentario Al Directivo</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!--form-->
                                                                                  <form  method="POST" action="http://localhost/umariana/php/vistas/responsable/comentariodirectivo.php">
                                                                                    <div class="mb-3">
                                                                                        <textarea class="form-control" id="comendir" name="comendir" rows="3"></textarea>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                    </div>
                                                                                    <input type="text" name="idsol" id="idsol" value="'.$datosn->id.'" hidden>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                                        <button type="submit" class="btn btn-info">Enviar</button>
                                                                                    </div>
                                                                                    </form>
                                                                                <!--end form-->
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                  <!--end editar-->
                                                                </td>
                                                                <td class="text-center">
                                                                  <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmar'.$datosn->id.'" title="Confirmar">
                                                                    <i class="fas fa-check-square" style="color: #C039FF; font-size:20px;"></i>
                                                                  </a>
                                                                  <!-- confirmar -->
                                                                  <div class="modal fade" id="confirmar'.$datosn->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Producto Terminado</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!--form-->
                                                                                <form method="POST" action="http://localhost/umariana/php/vistas/responsable/comentarioproducto.php"  enctype="multipart/form-data">
                                                                                <div class="mb-3">
                                                                                    <textarea class="form-control" id="comprod" name="comprod" rows="3"></textarea>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                              
                                                                                <input class="form-control" type="file" id="archivo" name="archivo">
                                                                                </div>
                                                                                <input type="text" name="ids" id="ids" value="'.$datosn->id.'" hidden>

                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                                    <button type="submit" class="btn btn-info">Enviar</button>
                                                                                </div>
                                                                                </form>
                                                                            <!--end form-->
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                  <!--end confirmar-->
                                                                </td>
                                                                </tr>';
                                                        }
                                                        echo '
                                                        </tbody>
                                                        <tbody id="tabla2"></tbody>
                                                        </table>
                                                        </div>
                                                        ';
                                                ?>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                            <?php
                                                    $cont=1;
                                                    echo '<div class="table-responsive">
                                                            <table class="table">
                                                            <thead class="table-info text-center" >
                                                            <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Solicitud</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Acción</th>
                                                            <th scope="col">Edición</th>
                                                            <th scope="col">Confirmación</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabla1">';
                                                        while ($p = mysqli_fetch_object($proceso)) {
                                                        echo '<tr>
                                                                <th>'.$cont++. '</th>
                                                                <td>'.$p->nomsolicitud.'</td>
                                                                <td>'.$p->nomservicio.'</td>
                                                                <td>'.$p->fec.'</td>
                                                                <td> 
                                                                <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width:'.$p->porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div><span style="font-size:13px;">'.$p->porcentaje.'%</span>
                                                                </td>
                                                                <td><!--modal detalle-->
                                                                <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1'.$p->id.'">
                                                                    Detalle
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="modal1'.$p->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable ">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción De Solicitud</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <!---card-->
                                                                        <div class="content-center">
                                                                        <div class="card">
                                                                            <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Fecha Evento: '.$p->fecha_evento.'</li>
                                                                                <li class="list-group-item">Correo solicitante: '.$p->email.'</li>
                                                                                <li class="list-group-item">Nombres Solicitante: '.$p->nombresol.'</li>
                                                                                <li class="list-group-item">Descripción Solicitud: '.$p->infodes.'</li>
                                                                                <li class="list-group-item">Público Dirigido: '.$p->publicodir.'</li>
                                                                                <li class="list-group-item">Lugar: '.$p->lugar.'</li>
                                                                                <li class="list-group-item">Requerimientos: '.$p->reque.'</li>
                                                                                <li class="list-group-item">Asistentes: '.$p->asistentes.'</li>
                                                                                <li class="list-group-item">Descripción Anéxo: '.$p->desanexo.'</li>';
                                                                                if($p->archivo != " "){
                                                                                echo '<li class="list-group-item"><a href="http://localhost/umariana/php/vistas/'.$p->archivo.'" download="anexo">Descargar archivo</a></li>';
                                                                                }
                                                                                
                                                                                else{
                                                                                echo '<li class="list-group-item">No hay archivo</li>';
                                                                                }
                                                                                echo '</ul>
                                                                                
                                                                                <br>
                                                                                <h5 class="text-left">&nbsp;&nbsp;&nbsp;Comentarios</h5>
                                                                                <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Comentario Edición: '.$p->motivo_edicion.'</li>
                                                                                <li class="list-group-item">Comentario Cancelación: '.$p->motivo_cancelacion.'</li>
                                                                                <li class="list-group-item"> Comentario director: '.$p->comencargado.'</li>
                                                                                <li class="list-group-item"> Archivo Adjunto: <a href="http://localhost/umariana/php/vistas/'.$p->productofinal.'" download="anexo">Descargar archivo</a></li>
                                                                                </ul>
                                                                                
                                                                            </div>
                                                                            </div>
                                                                        <!--end cards-->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <!--end modal descripcion-->
                                                                </td>
                                                                <td class="text-center">
                                                                  <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editar'.$p->id.'" title="Enviar comentario de ajuste">
                                                                    <i class="fas fa-edit" style="color: #3942FF; font-size:20px;"></i>
                                                                  </a>
                                                                  <!-- editar -->
                                                                  <div class="modal fade" id="editar'.$p->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Comentario Al Directivo</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!--form-->
                                                                                  <form  method="POST" action="http://localhost/umariana/php/vistas/responsable/comentariodirectivo.php">
                                                                                    <div class="mb-3">
                                                                                        <textarea class="form-control" id="comendir" name="comendir" rows="3"></textarea>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                    </div>
                                                                                    <input type="text" name="idsol" id="idsol" value="'.$p->id.'" hidden>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                                        <button type="submit" class="btn btn-info">Enviar</button>
                                                                                    </div>
                                                                                    </form>
                                                                                <!--end form-->
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                  <!--end editar-->
                                                                </td>
                                                                <td class="text-center">
                                                                  <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#confirmar'.$p->id.'" title="Confirmar">
                                                                    <i class="fas fa-check-square" style="color: #C039FF; font-size:20px;"></i>
                                                                  </a>
                                                                  <!-- confirmar -->
                                                                  <div class="modal fade" id="confirmar'.$p->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Producto Terminado</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!--form-->
                                                                                <form method="POST" action="http://localhost/umariana/php/vistas/responsable/comentarioproducto.php"  enctype="multipart/form-data">
                                                                                <div class="mb-3">
                                                                                    <textarea class="form-control" id="comprod" name="comprod" rows="3"></textarea>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                               
                                                                                <input class="form-control" type="file" id="archivo" name="archivo">
                                                                                </div>
                                                                                <input type="text" name="ids" id="ids" value="'.$p->id.'" hidden>

                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                                    <button type="submit" class="btn btn-info">Enviar</button>
                                                                                </div>
                                                                                </form>
                                                                            <!--end form-->
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                  <!--end confirmar-->
                                                                </td>
                                                                </tr>';
                                                        }
                                                        echo '
                                                        </tbody>
                                                        <tbody id="tabla2"></tbody>
                                                        </table>
                                                        </div>
                                                        ';
                                                ?>


                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                            <div class="row">
                                            <?php
                                                    $cot=1;
                                                    echo '<div class="table-responsive">
                                                            <table class="table">
                                                            <thead class="table-info text-center" >
                                                            <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Solicitud</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Acción</th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabla1">';
                                                        while ($q = mysqli_fetch_object($fin)) {
                                                        echo '<tr>
                                                                <th>'.$cot++. '</th>
                                                                <td>'.$q->nomsolicitud.'</td>
                                                                <td>'.$q->nomservicio.'</td>
                                                                <td>'.$q->fec.'</td>
                                                                <td> 
                                                                <div class="progress">
                                                                <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width:'.$q->porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div><span style="font-size:13px;">'.$q->porcentaje.'%</span>
                                                                </td>
                                                                <td><!--modal detalle-->
                                                                <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1'.$q->id.'">
                                                                    Detalle
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="modal1'.$q->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable ">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción De Solicitud</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <!---card-->
                                                                        <div class="content-center">
                                                                        <div class="card">
                                                                            <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Fecha Evento: '.$q->fecha_evento.'</li>
                                                                                <li class="list-group-item">Correo solicitante: '.$q->email.'</li>
                                                                                <li class="list-group-item">Nombres Solicitante: '.$q->nombresol.'</li>
                                                                                <li class="list-group-item">Descripción Solicitud: '.$q->infodes.'</li>
                                                                                <li class="list-group-item">Público Dirigido: '.$q->publicodir.'</li>
                                                                                <li class="list-group-item">Lugar: '.$q->lugar.'</li>
                                                                                <li class="list-group-item">Requerimientos: '.$q->reque.'</li>
                                                                                <li class="list-group-item">Asistentes: '.$q->asistentes.'</li>
                                                                                <li class="list-group-item">Descripción Anéxo: '.$q->desanexo.'</li>';
                                                                                if($q->archivo != " "){
                                                                                echo '<li class="list-group-item"><a href="http://localhost/umariana/php/vistas/'.$q->archivo.'" download="anexo">Descargar archivo</a></li>';
                                                                                }
                                                                                
                                                                                else{
                                                                                echo '<li class="list-group-item">No hay archivo</li>';
                                                                                }
                                                                                echo '</ul>
                                                                                
                                                                                <br>
                                                                                <h5 class="text-left">&nbsp;&nbsp;&nbsp;Comentarios</h5>
                                                                                <ul class="list-group list-group-flush">
                                                                                <li class="list-group-item">Comentario Edición: '.$q->motivo_edicion.'</li>
                                                                                <li class="list-group-item">Comentario Cancelación: '.$q->motivo_cancelacion.'</li>
                                                                                <li class="list-group-item"> Comentario director: '.$q->comencargado.'</li>
                                                                                <li class="list-group-item">Archivo Adjunto: <a href="http://localhost/umariana/php/vistas/'.$q->productofinal.'" download="anexo">Descargar archivo</a></li>
                                                                                </ul>
                                                                                
                                                                            </div>
                                                                            </div>
                                                                        <!--end cards-->
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                                                                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <!--end modal descripcion-->
                                                                </td
                                                                </tr>';
                                                        }
                                                        echo '
                                                        </tbody>
                                                        <tbody id="tabla2"></tbody>
                                                        </table>
                                                        </div>
                                                        ';
                                                ?>

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
        /*.modal-backdrop {
            z-index: -1;
            }*/
    </style>
          <?php include('../lib/footer.php') ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  
    </body>
<!--end plantilla-->