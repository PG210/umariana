$(document).ready(function() {
    $('#formurecuperacion').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './php/cambiopass.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                
                if (jsonData.success == "1")
                {
                    // alert('registrar datos');
                    toastr.success('<h5>Cambio de contraseña exitoso!</h5>', ' ',{
                        'closeButton': true,
                       });
                       
                     setTimeout(function(){ 
                        window.location.href = './index.php'; //envia datos ala vista
                      },2000);
                    
                  
                }
                else
                {
                    toastr.warning('<h5>Datos vacios o Correo no existe!</h5>', ' ',{
                        'closeButton': true,
                       });
                                                     
                }
           }
       });
     });
});