$(document).ready(function() {
    $('#formrecuperar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './php/recuperar.php',
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
                    window.location.href = './php/verificarcontra.php';
                  },2000);
                  
                }
                else
                {
                    if(jsonData.success == "2"){
                      //  alert('Usuario ya se encuentra registrado!');
                        toastr.warning('<h4>El usuario no esta registrado</h4>', ' ',{
                            'closeButton': true,
                        });
                    }else{
                       // alert('Solicite su registro al administrador');
                        toastr.error('<h4>Datos Vacios</h4>', ' ',{
                            'closeButton': true,
                        });
                    
                    }
                    
                }
           }
       });
     });
});