<?php 
include '../conexion.php';
include('../recordaremail.php');

$valor = filter_input(INPUT_POST, 'valor');

$validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$valor'");
$val= $validar->fetch_object();
if($val->num != 0){
   //comparar el motivo que llega
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
            WHERE solicitud.id_solicitud = '$valor'");
           

   /* $revisor = $conexion->query("SELECT persona.email AS correo
                from persona
                WHERE persona.id_rol = '3'");*/

    $datoscon=$info->fetch_object();
            //cambiar el email del encargado
     recoemail($datoscon->emailencargado, $datoscon->nomsolicitud, $datoscon->nomservicio, $datoscon->infodes, $datoscon->publicodir, 
            $datoscon->nombresol, $datoscon->archivo, $datoscon->fecha_evento, $datoscon->fechas_evento, $datoscon->lugar, $datoscon->reque, $datoscon->asistentes, $datoscon->hora);
            echo json_encode(['success' =>5]);
}else{
       echo json_encode(['success' =>6]);
}
?>