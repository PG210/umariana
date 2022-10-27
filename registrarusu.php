<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/ind_reg.css">
    <link rel="stylesheet" href="./assets/css/toast.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/l.png" />
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b820e1a70c.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth back_g">
                <div class="row flex-grow">
                    <div class="col-4 mx-auto card_wh1">
                        <div class="auth-form-light p-4 text-center align-items-center card_wh">
                            <form class="p-3 text-center align-items-center needs-validation"  method="post" id="frm_r" action="" novalidate>
                             <h1> <?php 
                                    include ('./php/conexion.php');
                                    include('./php/registrodb.php');
                                    ?></h1>
                             <div class="brand-logo">
                                    <img src="./assets/images/lg.png" id="img_lg">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" pattern=".+@umariana\.edu.co" name="correo" id="correo" placeholder="correo@umariana.edu.co"  required>
                                    <div class="invalid-feedback">
                                        Ingrese su correo electrónico institucional.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="contra" name="contra"  placeholder="contraseña" required>
                                    <div class="invalid-feedback">
                                        Ingrese la contraseña.
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-facebook btn-info" id="btn-ag" type="submit" name="registrobtn">Registarse</button>
                                </div>
                                <div class="mt-4 font-weight-light">¿Ya tienes una cuenta? <a href="index.php" class="text-primary"><strong>Ingresa</strong></a></div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Email que se enviara al index en caso de que el usuario ya esté registrado -->
                <form class="p-3 text-center align-items-center visually-hidden" action='./' method="post" id="frm_email">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg disable" name="email_registrado" id="email_registro" >
                        <input type="submit" value="submit">
                    </div>
                </form>

                <!-- Modal de validación de correo -->
                <div class="modal fade" id="modalVali" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="modalVali" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content modal_1">
                            <form class="needs-validation2" method="post" action='./php/registro.php'>
                                <div class="modal-header col-12">
                                    <h4 class="modal-title" id="modalrecu"><b>Validar Correo</b></h4>
                                    <nav aria-label="breadcrumb">
                                        <h5 id="m_s"></h5>
                                    </nav>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <p class="p2">Ingresa el código de verificación enviado a tu correo electrónico:
                                        </p>
                                        <div class="row rw_code">
                                            <div class="row col-12 code_v">
                                                <div class="col-2 mb-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code" onchange="estado_btn_validar()" id="c" maxlength="1" placeholder="c">
                                                </div>
                                                <div class="col-2 mb-2 y-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code" onchange="estado_btn_validar()" id="o" maxlength="1" placeholder="o">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code" onchange="estado_btn_validar()" id="d" maxlength="1" placeholder="d">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code" onchange="estado_btn_validar()" id="e" maxlength="1" placeholder="e">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input name="email" id="email" type="hidden"><input type="hidden" name="password" id="password">
                                                    <button class="btn btn-info" type="submit" id="btn_va">Validar</button>
                                                </div>
                                                <small class="text-danger" id='msj'><i class="fa-solid fa-circle-info"></i><b> Código
                                                        incorrecto</b></small>
                                                <small class="text-success" id='msj2'><b>Verificación
                                                        completada</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-md-start">
                                    <i class="mdi mdi-information-outline text-warning px-2"></i>
                                    <p class="p1"><strong>Intentos: <p id="cant_in">0 - 3</p></strong></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <!--<script src="./js/registro.js"></script>-->
    <script src="./js/bootstrap.js"></script>
    <!-- endinject -->
</body>

</html>