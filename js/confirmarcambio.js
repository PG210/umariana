$(document).ready(function() {
    $('#formrecu').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/codigorecu.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                
                if (jsonData.success == "2")
                {
                    toastr.warning('<h5>El código no es correcto!</h5>', ' ',{
                        'closeButton': true,
                       });
                  
                }
                else
                {
                    // alert('registrar datos');
                    toastr.success('<h5>Confirmación exitosa!</h5>', ' ',{
                        'closeButton': true,
                       });
                       
                      setTimeout(function(){ 
                        var cor = jsonData.success;
                        window.location.href = '../formcontra.php'+ "?correo=" + cor; //envia datos ala vista
                      },2000);
                                                     
                }
           }
       });
     });
});