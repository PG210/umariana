<?php 

include '../conexion.php';
//retornar información
$respuesta = $conexion->query("SELECT solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                solicitud.asistentes, solicitud.hora_evento AS hora
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                WHERE solicitud.id_estado_solicitud = 1");
/*$datos=$respuesta->fetch_object();*/
echo '<table class="table table-bordered">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Id</th>
    <th scope="col">Grupo</th>
    <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>';
while ($datos = mysqli_fetch_object($respuesta)) {
    echo '<tr>
    <td>'.$datos->fec.'</td>
    <td>'.$datos->archivo.'</td>
    <td>'.$datos->infodes.'</td>
    <td>'.$datos->publicodir.'</td>
    <td>'.$datos->desanexo.'</td>
    <td>'.$datos->nomsolicitud.'</td>
    <td>'.$datos->nomservicio.'</td>
    <td>'.$datos->nombresol.'</td>
    <td>'.$datos->email.'</td>
    <td>'.$datos->emailencargado.'</td>
    <td>'.$datos->fecha_evento.'</td>
    <td>'.$datos->fechas_evento.'</td>
    <td>'.$datos->lugar.'</td>
    <td>'.$datos->reque.'</td>
    <td>'.$datos->asistentes.'</td>
    <td>'.$datos->hora.'</td>
    </tr>';
 }
echo '</tbody>
</table>';
?>

