$(document).ready(function() {
    $('#iniciosesion').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: './php/inicio/login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                   
                    toastr.warning('<h4>El usuario no tiene acceso al sistema.</h4>', ' ',{
                        'closeButton': true,
                    });
                    $("#iniciosesion")[0].reset();  
                  
                }
                else
                {
                    if(jsonData.success == "2"){
                      setTimeout(function(){ 
                        window.location.href = './php/inicio/usuario.php';
                       });
                    }else{
                        if(jsonData.success == "3"){
                            setTimeout(function(){ 
                                window.location.href = './php/inicio/director.php';
                               });
                        }else{

                           if(jsonData.success == "4"){
                            setTimeout(function(){ 
                                window.location.href = './php/inicio/responsable.php';
                               });
                           }else{

                            if(jsonData.success == "5"){
                                toastr.warning('<h4>La contraseña es incorrecta.</h4>', ' ',{
                                    'closeButton': true,
                                });
                                $("#iniciosesion")[0].reset();
                            }else{
                                toastr.error('<h4>Datos Vacios</h4>', ' ',{
                                    'closeButton': true,
                                });
                            }

                           }
                           
                        }
                    
                    }
                    
                }
           }
       });
     });
});