function getAjax(dart){
var id = dart;
console.log(id);
$.ajax({
    data: {id: id},
     url: "../../php/vistas/aceptarproceso.php", //url de donde obtener los datos
     dataType: 'json', //tipo de datos retornados
     type: 'post' //enviar variables como post
}).done(function (data){
    var jsonData = data;
     console.log(jsonData.success);

     if (jsonData.success == "1")
     {
     toastr.success('<h5>Solicitud Aceptada!</h5>', ' ',{
        'closeButton': true,
       });
      // $("#tabla1").hide();
      // $("#tabla2").empty();
      setTimeout(function(){ 
        window.location.href = "http://localhost/umariana/php/inicio/director.php"; //envia datos ala vista
      },1000);

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
//cancelar funcion
function cancelar(val){
    var valor = val;
    $.ajax({
        data: {valor: valor},
         url: "../../php/vistas/cancelarsol.php", //url de donde obtener los datos
         dataType: 'json', //tipo de datos retornados
         type: 'post' //enviar variables como post
    }).done(function (data){
        var jsonData = data;
         console.log(jsonData.success);
    
         if (jsonData.success == "3")
         {
         toastr.warning('<h5>Solicitud Cancelada!</h5>', ' ',{
            'closeButton': true,
           });
          // $("#tabla1").hide();
          // $("#tabla2").empty();
          setTimeout(function(){ 
            window.location.href = "http://localhost/umariana/php/inicio/director.php"; //envia datos ala vista
          },1000);
    
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


    //recordar correo
    function recordar(identificador){
        var identificador = identificador;
        $.ajax({
            data: {valor: identificador},
             url: "../../php/vistas/recordarsolicitud.php", //url de donde obtener los datos
             dataType: 'json', //tipo de datos retornados
             type: 'post' //enviar variables como post
            }).done(function (data){
            var jsonData = data;
             console.log(jsonData.success);
        
             if (jsonData.success == "5")
             {
             toastr.warning('<h5>Se envió un recordatorio!</h5>', ' ',{
                'closeButton': true,
               });        
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
    
    //eliminar solicitud
    function eliminar(idelmin){
        var idelmin = idelmin;
        $.ajax({
            data: {valor: idelmin},
             url: "../../php/vistas/eliminarsolicitud.php", //url de donde obtener los datos
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
                  setTimeout(function(){ 
                    window.location.href = "http://localhost/umariana/php/inicio/director.php"; //envia datos ala vista
                  },1000);       
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

      //confirmar
      function confirmar(idconfi){
        var idconfi = idconfi;
        $.ajax({
            data: {valor: idconfi},
             url: "../../php/vistas/confirmardb.php", //url de donde obtener los datos
             dataType: 'json', //tipo de datos retornados
             type: 'post' //enviar variables como post
            }).done(function (data){

                var jsonData = data;
                console.log(jsonData.success);
                if (jsonData.success == "1")
                {
                toastr.warning('<h5>Solicitud Confirmada</h5>', ' ',{
                   'closeButton': true,
                  }); 
                 /* setTimeout(function(){ 
                    window.location.href = "http://localhost/umariana/php/inicio/director.php"; //envia datos ala vista
                  },1000); */      
                }else{
                   toastr.error('<h5>Solicitud ya esta confirmada!</h5>', ' ',{
                       'closeButton': true,
                      });
                }
             
            //conformar respuesta final
            //$('#resultado').html('El resultado es: <b>' + data['res'] + '</b>');
           // http://localhost/umariana/php/inicio/php/vistas/aceptarproceso.php 
        });
        }
     
    