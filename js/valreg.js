$(document).ready(function() {
    $('#valform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/registroval.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                
                if (jsonData.success == "1")
                {
                   // alert('registrar datos');
                   toastr.success('<h5>Confirmación exitosa!</h5>', ' ',{
                    'closeButton': true,
                   });
                   
                  setTimeout(function(){ 
                    window.location.href = '../index.php';
                  },2000);
                  
                }
                else
                {
                    if(jsonData.success == "2"){
                                  
                            toastr.warning('<h4>El código es incorrecto</h4>', ' ',{
                                'closeButton': true,
                            });
                            $("#valform")[0].reset();                      
                                                                     
                    }else{
                        toastr.error('<h4>Datos Vacios</h4>', ' ',{
                            'closeButton': true,
                        });
                    }
                               
                }
           }
       });
     });
});