<?php 
if(isset($_GET["v"])){
$id= $_GET["v"];
include '../conexion.php';
//retornar información
$respuesta = $conexion->query("SELECT solicitud.id_solicitud AS id, solicitud.fecha_evento AS fec, solicitud.anexos AS archivo, solicitud.informacion_desarrollo AS infodes, solicitud.publico_objetivo AS publicodir, 
                solicitud.descripcion_anexo AS desanexo, tipo_solicitud.nombre_tipo AS nomsolicitud, tipo_Servicio.nombre_servicio AS nomservicio,
                persona.nombres AS nombresol, persona.email, encargado.email AS emailencargado,
                solicitud.fecha_evento, solicitud.fechas_evento, solicitud.lugar_evento AS lugar, solicitud.requerimientos AS reque,
                solicitud.asistentes, solicitud.hora_evento AS hora, solicitud.motivo_cancelacion, solicitud.motivo_edicion,
                tipo_estado.porcentaje, solicitud.id_estado_solicitud AS esta
                from solicitud 
                JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud 
                JOIN tipo_servicio ON tipo_solicitud.id_tipo_servicio = tipo_servicio.id_tipo_servicio
                JOIN persona ON solicitud.id_solicitante = persona.id_persona
                JOIN persona AS encargado ON solicitud.id_encargado = encargado.id_persona
                JOIN tipo_estado ON solicitud.id_estado_solicitud = tipo_estado.id_tipo_estado
                WHERE  persona.id_persona='$id' AND solicitud.id_estado_solicitud != 8 AND solicitud.id_estado_solicitud != 7");
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
      <th scope="col">Estado</th>
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
        <td> 
        <div class="progress">
        <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width:'.$datos->porcentaje.'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div><span style="font-size:13px;">'.$datos->porcentaje.'%</span>
        </td>
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
        <td>';
          if($datos->esta == 3){
              echo '<!--se puede editar todos los campos-->
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editartodo'.$datos->id.'">
                  Editar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editartodo'.$datos->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Formulario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" method="POST" action="../../php/vistas/usuario/formuno.php">
                           <!---formulario-->
                           <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha evento</label>
                            <input type="date" class="form-control" id="fechaev" name="fechaev" value="'.$datos->fecha_evento.'">
                          </div>
                          <div class="mb-3">
                           <label for="exampleFormControlInput1" class="form-label">Descripción solicitud</label>
                           <textarea class="form-control" id="desolicitud" name="desolicitud" rows="3" placeholder="'.$datos->infodes.'"></textarea>
                          </div>
                              <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Público dirijido</label>
                              <input  type="text" class="form-control" id="publico" name="publico" value="'.$datos->publicodir.'"></input>
                            </div>
                            <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Lugar</label>
                              <input type="text" class="form-control" id="lugar" name="lugar" value="'.$datos->lugar.'"></input>
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Requerimientos</label>
                            <input type="text" class="form-control" id="reque" name="reque" value="'.$datos->reque.'"></input>
                            </div>
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Asistentes</label>
                            <input type="text" class="form-control" id="asis" name="asis" value="'.$datos->asistentes.'"></input>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Descripción anexo</label>
                            <textarea class="form-control" id="desanexo" name="desanexo" placeholder="'.$datos->desanexo.'" ></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Elegir archivo</label>
                            <input type="file" class="form-control" id="archivo" name="archivo"></input>
                          </div>
                          <input type="text" class="form-control" id="ideditar" name="ideditar" value="'.$datos->id.'" hidden>
                           <!-- end formulario-->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Modificar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              
              '; 
          }else{
            echo '<!--se puede editar todos los campos-->
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarfec'.$datos->id.'">
                  Editar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editarfec'.$datos->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Formulario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       <!---tab-->
                       <div class="accordion" id="accordionExample">
                       <div class="accordion-item">
                         <h2 class="accordion-header" id="headingOne">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Editar Fecha De Evento
                           </button>
                         </h2>
                         <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                              <!---formulario-->
                              <form method="POST" action="../../php/vistas/usuario/formudos.php">
                                <div class="mb-3">
                                  <label for="exampleFormControlInput1" class="form-label">Fecha evento</label>
                                  <input type="date" class="form-control" id="fechaevdos" name="fechaevdos" value="'.$datos->fecha_evento.'">
                                </div>
                                <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Comentario</label>
                                <textarea class="form-control" id="comfecha" name="comfecha"></textarea>
                               </div>
                                <input type="text" class="form-control" id="idsolicitud" name="idsolicitud" value="'.$datos->id.'" hidden>
                                <button type="submit" class="btn btn-primary">Modificar</button>
                              </form>
                              <!--end formulario-->
                           </div>
                         </div>
                       </div>
                       <div class="accordion-item">
                         <h2 class="accordion-header" id="headingTwo">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Cancelar Solicitud
                           </button>
                         </h2>
                         <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                             <!--formulario-->
                             <form method="POST" action="../../php/vistas/usuario/formutres.php">
                             <div class="mb-3">
                               <label for="exampleFormControlInput1" class="form-label">Comentario</label>
                               <textarea class="form-control" id="comcancel" name="comcancel"></textarea>
                              </div>
                              <input type="text" class="form-control" id="idcancelar" name="idcancelar" value="'.$datos->id.'" hidden>
                              <button type="submit" class="btn btn-danger">Cancelar</button>
                             </form>
                             <!---end formulario-->
                           </div>
                         </div>
                       </div>
                       </div>
                       <!--end tabs-->
                       <!--footer-->
                       <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Salir</button>
                      </div>
                       <!--end footer-->
                      </div>
                    </div>
                  </div>
                </div>
              
              '; 
          }
          echo '</td>
        </tr>';
 }
echo '
</tbody>
<tbody id="tabla2"></tbody>
</table>
</div>
';
}
?>
