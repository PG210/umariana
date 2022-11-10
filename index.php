<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/toast.css">
    <link rel="stylesheet" href="./assets/css/ind_reg.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/l.png" />
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b820e1a70c.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.history.forward();
        function sinVueltaAtras(){ window.history.forward(); }
     </script>
</head>

<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">

    <!--sesiones-->
    <?php session_start();?>
    <?php
        if(isset($_SESSION['correo'])){
        echo "<p>Has iniciado sesion como: " . $_SESSION['correo'] . "";
        echo "<p><a href='/umariana/php/inicio/logout.php'>Cerrar Sesion</a></p>";
        echo "<br><p><a href='/umariana/php/inicio/login.php'>Ir al panel de control</a>";
        }else {
        ?>
         <!--body del formulario-->

          <!---end sesion-->
            <div class="container-scroller">
                <div class="container-fluid page-body-wrapper full-page-wrapper">
                    <div class="content-wrapper d-flex align-items-center auth back_g">
                        <div class="row flex-grow">
                            <div class="col-4 mx-auto card_wh1">
                                <div class="auth-form-light p-5 text-center align-items-center card_wh">
                                    <form class=" needs-validation" id="iniciosesion" name="iniciosesion" method="POST">
                                        <div class="brand-logo">
                                            <img src="./assets/images/lg.png" id="img_lg">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg"  name="correo" id="correo" required placeholder="correo@umariana.edu.co">
                                            <div class="invalid-feedback">
                                                Ingrese su correo electrónico institucional.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg" name="pass" id="pass" required placeholder="contraseña">
                                            <div class="invalid-feedback">
                                                Ingrese la contraseña.
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-facebook btn-info" type="submit" id="btn-ag">Ingresar</button>
                                        </div>
                                    </form>
                                    <div class="font-weight-light">
                                        <a class="mt-1 btn btn_m" data-bs-toggle="modal" data-bs-target="#modalRecu" data-bs-dismiss="modal">
                                            <p>¿Olvidaste tu contraseña?</p>
                                        </a>
                                    </div>
                                    <div class="font-weight-light">¿No tienes una cuenta? <a href="./registrarusu.php" class="text-primary"><strong>Regístrate</strong></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email que se enviara al index en caso de que el usuario no esté registrado -->
                        <form class="p-3 text-center align-items-center visually-hidden" action='./registrov' method="post" id="frm_email">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg disable" name="email_registrado" id="email_registro" >
                                <input type="submit" value="j">
                            </div>
                        </form>
                    </div>



                    <!-- modal recuperación contraseña -->
                    <div class="modal fade" id="modalRecu" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="modalrecu" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modal_">
                                <form class=" needs-validation2" id="formrecuperar" method="post">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modalrecu"><b>Recuperar Contraseña</b></h4>
                                        <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <br>
                                        <div class="row">
                                            <div class="col-2 mb-2 c1">
                                                <img src="./assets/images/recuperar_contraseña.png" alt="logo" id="img_re" />
                                            </div>
                                            <div class="col-7 mb-2 c1 c2">
                                                <input type="email" class="form-control form-control-lg" id="mail_r" name="emailrecu" required placeholder="correo@umariana.edu.co">
                                                <div class="invalid-feedback">
                                                    Ingrese su correo electrónico institucional.
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <button class="btn btn-outline-facebook" id="btn_re" type="submit">Recuperar</button>
                                            </div>
                                        </div>

                                    

                                    </div>
                                    <div class="modal-footer justify-content-md-start">
                                        <i class="mdi mdi-information-outline text-warning px-2"></i>
                                        <p class="p1">Se enviará un mail a su correo institucional.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                
                    <!-- content-wrapper ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>

         <!--body del formulario-->
        <?php
        }
      ?>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <!--<script src="js/index.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="./js/recuperar.js"></script>
    <script src="./js/inicioses.js"></script>
    <!-- endinject -->
      
</body>

</html>