<?php 
include('../conexion.php');
include('../lib/header.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<title>Director</title>
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
              <!---iframe-->
              <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                   <!---información-->
                                   <div class="row">
                                      <div class="col-4">
                                        <!--formulario-->
                                        <div class="container" style="background-color:#39FFEA; border-raidus: 20px;">
                                         <br>
                                        <div class="mb-3">
                                          <div class="container text-center">
                                           <h5 class="m-0 font-weight-bold text-primary">Filtrar Por solicitud </h5>
                                          </div>
                                          <br>
                                          <form method="POST" id="consulta">
                                           <select class="form-select" aria-label="Default select example"  name="soltipo" id="soltipo">
                                            <option selected>Seleccionar Tipo</option>
                                            <option value="1">Servicio publicitario y/o diseño</option>
                                            <option value="2">Servicio de comunicaciones externos</option>
                                            <!--end tipo-->
                                            </select>
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Fecha Inicial</label>
                                            <input type="date" class="form-control" id="fechai" name="fechai">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Fecha Final</label>
                                            <input type="date" class="form-control" id="fechaf" name="fechaf">
                                            </div>
                                              <button type="submit" class="btn btn-warning float-end">Enviar</button>
                                            <br><br>
                                            </form> 
                                            </div>
                                            <!---reportes-->
                                           <!-- <h1>Reportes pdf</h1>-->
                                        <!--end formulario-->
                                      </div>
                                      <div class="col-1"></div>
                                      <div class="col-7">
                                      <!---formulario-->
                                      <div class="row">
                                        <!-- Area Chart -->
                                        <div class="container text-center">
                                        <div>
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h5 class="m-0 font-weight-bold text-primary">Solicitudes Por Tipo </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="clearfix">
                                                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                                    </div>
                                                    <div class="container">
                                                        <div id="graficaBarras">   
                                                         <canvas id="myChart" width="400" height="400"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div>
                                        <!--grafico circulo-->
                                        <br>
                                        <canvas id="oilChart" width="600" height="400"></canvas>
                                        <!--end grafico circulo-->
                                      <!---end-->
                                      </div>
                                   </div>
                                     
                                   <!---información-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <!--iframe-->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     <?php include('../lib/footer.php') ?>
     
     <script src="../../graf/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../../graf/demo/chart-pie-demo.js"></script>
    <script src="../../graf/demo/chart-bar-demo.js"></script>
    <!--ajax--->
    <script>
    $(document).ready(function() {
    $('#consulta').submit(function(e) {
       // $('.resultados').html('<canvas id="grafico"></canvas>');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../../php/vistas/directivo/graficobarra.php',
            data: $(this).serialize(),
            success: function(result)
            {
                var valores =eval(result);
                 console.log(valores);
                
                 $("#consulta")[0].reset();//reseat el form

                if(valores.length == 6){
                   var d6 =  valores[5]['total'];
                   var n6 =  valores[5]['nombre_tipo'];
                }else{
                   var d6 =  0;
                   var n6 =  0;
                }
                   var d1 =  valores[0]['total'];
                   var d2 =  valores[1]['total'];
                   var d3 =  valores[2]['total'];
                   var d4 =  valores[3]['total'];
                   var d5 =  valores[4]['total'];
                  
                  
                 //nombres labs
                   var n1 =  valores[0]['nombre_tipo'];
                   var n2 =  valores[1]['nombre_tipo'];
                   var n3 =  valores[2]['nombre_tipo'];
                   var n4 =  valores[3]['nombre_tipo'];
                   var n5 =  valores[4]['nombre_tipo'];
                   
                  
                 //datos graf
                  //7  var canvas = document.getElementById('oilCanvas');
                   // var contexto = canvas.getContext('2d');
                   // contexto.clearRect(0, 0, canvas.width, canvas.height);
                       
                  const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [n1, n2, n3, n4, n5, n6],
                            datasets: [{
                                label: "Solicitud",
                                data: [d1, d2, d3, d4, d5, d6],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(153, 102, 255, 0.5)',
                                    'rgba(255, 159, 64, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100,
                                    min: 0
                                }
                            }
                        }
                    });
               
                  //end graf     
                  //grafico circulo
                  var oilCanvas = document.getElementById("oilChart");

                        Chart.defaults.global.defaultFontFamily = "Lato";
                        Chart.defaults.global.defaultFontSize = 18;

                        var oilData = {
                            labels: [
                                n1, n2, n3, n4, n5, n6
                            ],
                            datasets: [
                                {
                                    data: [d1, d2, d3, d4, d5, d6],
                                    backgroundColor: [
                                        "#FF6384",
                                        "#63FF84",
                                        "#84FF63",
                                        "#8463FF",
                                        "#6384FF"
                                    ]
                                }]
                        };

                        var pieChart = new Chart(oilCanvas, {
                        type: 'pie',
                        data: oilData
                        });
                  //end grafico circulo
                 

                }
            });
            });
        });
              
    </script>
    </body>
<!--end plantilla-->