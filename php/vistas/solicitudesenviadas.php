<?php 

include '../conexion.php';
//retornar información
$respuesta = $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.motivo_cancelacion, solicitud.motivo_edicion
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                WHERE solicitud.id_estado_solicitud = 1 OR solicitud.id_estado_solicitud = 3");


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
              <div class="modal-dialog modal-dialog-scrollable">
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
        <!-- Button trigger modal -->
          <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop'.$datos->id.'">
            Comentario
          </a>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop'.$datos->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel1">Agregar Comentarios</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="http://localhost/umariana/php/vistas/enviarcomentario.php">
                    <div class="mb-3">
                      <textarea class="form-control" id="textocomen" name="textocomen" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                    <!--radio-->
                          <div class="form-check">
                          <input class="form-check-input" type="radio" name="motivo" value="1" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Edición
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="motivo" value="2" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Cancelación
                          </label>
                        </div>
                        <!-- end radio-->
                    </div>
                    <input type="email" name="correo" id="correo" value="'.$datos->email.'" hidden>
                    <input type="text" name="iden" id="iden" value="'.$datos->id.'" hidden>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                      <button type="submit" class="btn btn-info">Enviar</button>
                    </div>
                  </form>
                </div>
               
              </div>
            </div>
          </div>
        </td>
        <td>
        <!---modal seleccionar revisor-->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#encargado'.$datos->id.'">
          Asignar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="encargado'.$datos->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="http://localhost/umariana/php/vistas/asignarencargado.php">
                <!---elegir revisor-->';
                echo '<select class="form-select" aria-label="Default select example" name="encargado" id="encargado">
                      <option selected>Elegir</option>';
                      $personas = $conexion->query("SELECT persona.id_persona AS idper, persona.nombres
                                  from persona
                                  WHERE persona.id_rol = 3 AND persona.nombres != 'Default'");
                        while ($per = mysqli_fetch_object($personas)) {
                            echo '<option value="'.$per->idper.'">'.$per->nombres.'</option>';
                        }
                echo '
                </select>
                
                <input value="'.$datos->id.'" name="idsol" id="idsol" hidden>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
              <!--end revisor-->
              </div>
            </div>
          </div>
        </div>
        <!--- end seleccionar editor-->
        </td>
        </tr>';
 }
echo '
</tbody>
<tbody id="tabla2"></tbody>
</table>
</div>
';

?>
