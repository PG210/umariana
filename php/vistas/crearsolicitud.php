<?php
    if(isset($_POST["tipo"])){
    
     include '../conexion.php';
     include '../enviarcorreo.php'; 
     
     //formulario uno
     $tipo = $_POST["tipo"];
     $servicio = $_POST["servicio"];
     $fechaev = $_POST["fechaevento"];
     $info_desarrollo =  $_POST["infodes"];
     $desc_anexo = $_POST["desc_anexo"];
     
     if(isset($_POST["publico"])){
      $publico = $_POST["publico"]; //validar del formulario 1
     }else{
      $publico = "N/A";
     }
     
     $usu = $_POST["usu"];
     $fec_actu = date("Y-m-d");

     //formulario dos
     $fecha_evento = $_POST["fecha_evento"];
     $infodesformu2 =  $_POST["desarrollo"];
     $infodesformu3 =  $_POST["desarrollonuevo"];
    

     if(isset($_POST["lugar_evento"])){
       $lugar = $_POST["lugar_evento"];  //validar
     }else{
      $lugar ="N/A";
     }
     if(isset($_POST["asistentes"])){
      $asistentes = $_POST["asistentes"]; //validar
     }else{
      $asistentes = "N/A";
     }
     if(isset($_POST["fechas"])){
      $fechas = $_POST["fechas"]; //validar
     }else{
      $fechas ="N/A";
     }
     if(isset($_POST["requerimiento"])){
      $requerimiento = $_POST["requerimiento"];
     }else{
      $requerimiento ="N/A";
     }

     if(isset($_POST["hora_evento"])){
       $horaevento = $_POST["hora_evento"];
     }else{
       $horaevento = "N/A";
     }

    
     //copiar la imagen a la carpeta archivos y guardar en la base de datos
     $directorio = 'archivos/';
     $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
     move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    
     if($info_desarrollo != NULL){
        
         //llenar los datos a la database
         $queryinsert =$conexion->query( "INSERT INTO solicitud(fecha_solicitud, id_tipo_solicitud, id_solicitante, 
         id_encargado, fecha_evento, fechas_evento, lugar_evento, hora_evento, informacion_desarrollo,
         publico_objetivo, anexos, descripcion_anexo, requerimientos,
         asistentes, id_estado_solicitud, motivo_cancelacion, motivo_edicion ) 
         VALUES('$fec_actu', '$tipo', '$usu', '12', '$fechaev', ' ', ' ', ' ', '$info_desarrollo', '$publico', '$subir_archivo', '$desc_anexo', ' ', ' ', '1', ' ', ' ') ");
      
     }else{
         if($infodesformu2 != NULL){
            //llenar los datos a la database
            $queryinsert =$conexion->query( "INSERT INTO solicitud(fecha_solicitud, id_tipo_solicitud, id_solicitante, 
            id_encargado, fecha_evento, fechas_evento, lugar_evento, hora_evento, informacion_desarrollo,
            publico_objetivo, anexos, descripcion_anexo, requerimientos,
            asistentes, id_estado_solicitud, motivo_cancelacion, motivo_edicion ) 
            VALUES('$fec_actu', '$tipo', '$usu', '12', '$fecha_evento', ' ', '$lugar', '$horaevento', '$infodesformu2', ' ', ' ', ' ', '$requerimiento', ' ', '1', ' ', ' ') ");
         
        }else{
            
          $queryinsert =$conexion->query( "INSERT INTO solicitud(fecha_solicitud, id_tipo_solicitud, id_solicitante, 
          id_encargado, fecha_evento, fechas_evento, lugar_evento, hora_evento, informacion_desarrollo,
          publico_objetivo, anexos, descripcion_anexo, requerimientos,
          asistentes, id_estado_solicitud, motivo_cancelacion, motivo_edicion ) 
          VALUES('$fec_actu', '$tipo', '$usu', '14', '$fecha_evento', '$fechas', ' ', ' ', '$infodesformu3', ' ', ' ', ' ', ' ', '$asistentes', '1', ' ', ' ') ");
            
         }
     }
  
    //una vez insertado enviar correo al usuario encargado
    // $idsolicitud = mysqli_insert_id($conexion); //devuelve el id del ultimo registro ingresado a la tabla 
    //consultar los datos para sacar la info
    /* $info = $conexion->query("SELECT solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                                      solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                                      persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                                      solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                                      solicitud.asistentes, solicitud.hora_evento AS hora
                               from solicitud 
                               JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                               JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                               JOIN persona ON solicitud.id_solicitante = persona.id_persona
                               JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                               WHERE solicitud.id_solicitud = '$idsolicitud'");
     $datoscon=$info->fetch_object();*/
     //email('pedrocuasquer21095@gmail.com', '1234');

     //$cor=$datoscon->$emailencargado;
    /* correoenvio($datoscon->emailencargado, $datoscon->nomsolicitud, $datoscon->nomservicio, $datoscon->infodes, $datoscon->publicodir, 
                   $datoscon->nombresol, $datoscon->archivo, $datoscon->fecha_evento, $datoscon->fechas_evento, $datoscon->lugar, $datoscon->reque, $datoscon->asistentes, $datoscon->hora);
     */
      header("location: http://localhost/umariana/php/inicio/usuario.php?msj=1");
     exit();

    }else{

        echo 'Dastos vacios';

  }
  
?>