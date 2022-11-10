<?php 

include '../conexion.php';
//retornar información
$respuesta = $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.motivo_cancelacion, solicitud.motivo_edicion, solicitud.comendir, solicitud.productofinal
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                WHERE solicitud.id_estado_solicitud = 5 OR  solicitud.id_estado_solicitud = 6 ");
/*$datos=$respuesta->fetch_object();*/
$conta =1;

echo '<div class="table-responsive">
    <table class="table">
    <thead class="table-info text-center" >
    <tr>
      <th scope="col">No</th>
      <th scope="col">Solicitud</th>
      <th scope="col">Servicio</th>
      <th scope="col">Fecha</th>
      <th scope="col" colspan="3">Acción</th>
    </tr>
  </thead>
  <tbody id="tabla1">';
  while ($datos = mysqli_fetch_object($respuesta)) {
   echo '<tr>
        <th>'.$conta++. '</th>
        <td>'.$datos->nomsolicitud.'</td>
        <td>'.$datos->nomservicio.'</td>
        <td>'.$datos->fec.'</td>
        <td><!--modal detalle-->
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1'.$datos->id.'">
              Detalle
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modal1'.$datos->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción De Solicitud</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <!---card-->
                  <div class="content-center">
                  <div class="card">
                       <ul class="list-group list-group-flush">
                          <li class="list-group-item">Fecha Evento: '.$datos->fecha_evento.'</li>
                          <li class="list-group-item">Correo solicitante: '.$datos->email.'</li>
                          <li class="list-group-item">Nombres Solicitante: '.$datos->nombresol.'</li>
                          <li class="list-group-item">Descripción Solicitud: '.$datos->infodes.'</li>
                          <li class="list-group-item">Público Dirigido: '.$datos->publicodir.'</li>
                          <li class="list-group-item">Lugar: '.$datos->lugar.'</li>
                          <li class="list-group-item">Requerimientos: '.$datos->reque.'</li>
                          <li class="list-group-item">Asistentes: '.$datos->asistentes.'</li>
                          <li class="list-group-item">Descripción Anéxo: '.$datos->desanexo.'</li>';
                         if($datos->archivo != " "){
                          echo '<li class="list-group-item"><a href="http://localhost/umariana/php/vistas/'.$datos->archivo.'" download="anexo">Descargar archivo</a></li>';
                         }
                        
                         else{
                         echo '<li class="list-group-item">No hay archivo</li>';
                         }
                         echo '</ul>
                         
                          <br>
                          <h5 class="text-left">&nbsp;&nbsp;&nbsp;Comentarios</h5>
                          <ul class="list-group list-group-flush">
                          <li class="list-group-item">Comentario Edición: '.$datos->motivo_edicion.'</li>
                          <li class="list-group-item">Comentario Cancelación: '.$datos->motivo_cancelacion.'</li>
                          <li class="list-group-item">Comentario Responsable: '.$datos->comendir.'</li>
                          <li class="list-group-item">Archivo adjunto: <a href="http://localhost/umariana/php/vistas/'.$datos->productofinal.'" download="anexo">Descargar archivo</a></li>
                          </ul>
                        
                      </div>
                      </div>
                  <!--end cards-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                   <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                  </div>
                </div>
              </div>
            </div>
            <!--end modal descripcion-->
           
        </td>
        <td>
         <button type="button" class="btn" onClick="confirmar('.$datos->id.')"><i class="fas fa-check-square" style="color:#39F0FF; font-size:24px;"></i></button></td>
        </tr>';
 }
echo '
</tbody>
</table>
</div>
';

?>
