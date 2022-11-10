   //eliminar solicitud usuario
   function eliminarsolusu(idelmin){
    var idelmin = idelmin;
    console.log(idelmin);
    $.ajax({
        data: {valor: idelmin},
         url: "http://localhost/umariana/php/vistas/usuario/eliminarsol.php", //url de donde obtener los datos
         dataType: 'json', //tipo de datos retornados
         type: 'post' //enviar variables como post
        }).done(function (data){

            var jsonData = data;
            console.log(jsonData.success);
            if (jsonData.success == "1")
            {
            toastr.warning('<h5>Solicitud eliminada!</h5>', ' ',{
               'closeButton': true,
              }); 
             /* setTimeout(function(){ 
                window.location.href = "http://localhost/umariana/php/inicio/solcanceladas.php?v=13"; //envia datos ala vista
              },1000); */      
            }else{
               toastr.error('<h5>No se encuentra la solicitud!</h5>', ' ',{
                   'closeButton': true,
                  });
            }
         
        //conformar respuesta final
        //$('#resultado').html('El resultado es: <b>' + data['res'] + '</b>');
       // http://localhost/umariana/php/inicio/php/vistas/aceptarproceso.php 
    });
    }