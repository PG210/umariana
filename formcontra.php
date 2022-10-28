<?php
// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_GET["correo"])) {
    // asignar w1 y w2 a dos variables
    $corvar = $_GET["correo"];
}
?>
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
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth back_g">
                <div class="row flex-grow">
                    <div class="col-4 mx-auto card_wh1">
                        <div class="auth-form-light p-5 text-center align-items-center card_wh">
                            <form class=" needs-validation" id="formurecuperacion" name="formurecuperacion" method="post">
                                <div class="brand-logo">
                                    <img src="./assets/images/lg.png" id="img_lg">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" pattern=".+@umariana\.edu.co" name="correorecu" id="correorecu" required placeholder="correo@umariana.edu.co" value="<?php echo $corvar; ?>" disabled>
                                    <div class="invalid-feedback">
                                        Ingrese su correo electrónico institucional.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="contrarecu" id="contrarecu" required placeholder="contraseña">
                                    <div class="invalid-feedback">
                                        Ingrese la contraseña.
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-facebook btn-info" type="submit" id="btn-ag">Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Email que se enviara al index en caso de que el usuario no esté registrado -->
            </div>
            <!-- modal recuperación contraseña -->
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
    <!--<script src="js/index.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- endinject -->
</body>

</html>