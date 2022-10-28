$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './php/registrodb.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    //location.href = 'my_profile.php';
                   // alert('registrar datos');
                   toastr.success('<h5>Revisa tu correo, se envió un mensaje de confirmación</h5>', ' ',{
                    'closeButton': true,
                   });
                   
                   setTimeout(function(){ 
                    window.location.href = './php/verificar.php';
                  },2000);
                  
                }
                else
                {
                    if(jsonData.success == "2"){
                      //  alert('Usuario ya se encuentra registrado!');
                        toastr.warning('<h4> Usuario ya se encuentra registrado</h4>', ' ',{
                            'closeButton': true,
                        });
                    }else{
                       // alert('Solicite su registro al administrador');
                        toastr.error('<h4> No tiene acceso al sistema</h4>', ' ',{
                            'closeButton': true,
                        });
                    
                    }
                    
                }
           }
       });
     });
});