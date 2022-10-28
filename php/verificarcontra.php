
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/ind_reg.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/l.png" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
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
                        <form class="needs-validation2" method="POST" id="formrecu">
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
                                                    <input type="text" class="form-control form-control-lg code"  id="c" name="c" maxlength="1" placeholder="c">
                                                </div>
                                                <div class="col-2 mb-2 y-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code"  id="o" name="o" maxlength="1" placeholder="o">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code"  id="d" name="d" maxlength="1" placeholder="d">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input type="text" class="form-control form-control-lg code"  id="e" name="e" maxlength="1" placeholder="e">
                                                </div>
                                                <div class="col-2 mb-2 dv_code">
                                                    <input name="email" id="email" type="hidden"><input type="hidden" name="password" id="password">
                                                    <button class="btn btn-info" type="submit" id="validaruno" name="boton">Validar</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-md-start">
                                    <i class="mdi mdi-information-outline text-warning px-2"></i>
                                    <p class="p1"><strong>Intentos: <span id="conta">0</span> - 3</strong></p>
                                    <div id="conta"></div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                                
                <!-- Email que se enviara al index en caso de que el usuario ya esté registrado -->
             

                <!-- Modal de validación de correo -->
               
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>-->
    <script src="../js/confirmarcambio.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        document.getElementById('validaruno').addEventListener('click', valida);
        let contador = 1;
            function valida(){
            $("#conta").empty();
                if(contador >= 3){
                    toastr.success('<h5>Alcanzo el número de intentos!</h5>', ' ',{
                            'closeButton': true,
                        });  
                        setTimeout(function(){ 
                            window.location.href = '../registrarusu.php';
                        },2000);
                    //document.getElementById('validar').disabled = 'true';
                }
            $('#conta').append(contador);
            contador++;
            }
    </script>

    <!-- endinject -->
</body>

</html>