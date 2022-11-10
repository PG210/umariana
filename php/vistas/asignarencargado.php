<?php
    if(isset($_POST["encargado"]) && isset($_POST["idsol"])){
    
     include '../conexion.php';
     include '../enviarcorreo.php'; 
     
     //formulario uno
     $id = $_POST["encargado"];
     $idsol = $_POST["idsol"];
    //evaluar si existe el encargado
     $conta =  $conexion->query( "SELECT COUNT(persona.id_persona) AS val FROM persona WHERE persona.id_persona='$id'"); 
     $res=$conta->fetch_object();
     if($res->val != 0){
        $conexion->query( "UPDATE solicitud SET id_encargado='$id', id_estado_solicitud='2' WHERE solicitud.id_solicitud='$idsol'");

        //asignar encargado
        $info = $conexion->query("SELECT solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                                      solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                                      persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                                      solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                                      solicitud.asistentes, solicitud.hora_evento AS hora
                               from solicitud 
                               JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                               JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                               JOIN persona ON solicitud.id_solicitante = persona.id_persona
                               JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                               WHERE solicitud.id_solicitud = '$idsol'");
        $datoscon=$info->fetch_object();
        correoenvio($datoscon->emailencargado, $datoscon->nomsolicitud, $datoscon->nomservicio, $datoscon->infodes, $datoscon->publicodir, 
        $datoscon->nombresol, $datoscon->archivo, $datoscon->fecha_evento, $datoscon->fechas_evento, $datoscon->lugar, $datoscon->reque, $datoscon->asistentes, $datoscon->hora);

        header("location: http://localhost/umariana/php/inicio/director.php?var=2");
        exit();
     }
    }
?>