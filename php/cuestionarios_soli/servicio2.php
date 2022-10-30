<!--Tipos de solicitud-->
<div id="tipo_s">
    <div class="d-flex py-2">
        <div class="col-12 row">
            <!--Tipo de solicitud-->
            <h5><b>Tipo de solicitud:</b></h5>
            <?php
            //crear una variable con la sentencia SQL
            $id_servicio = 2;
            $sql = "SELECT * FROM tipo_solicitud WHERE id_tipo_servicio=$id_servicio";
            // crear la variable para ejecutar la consulta
            $consulta = mysqli_query($conexion, $sql);
            while ($campos = mysqli_fetch_array($consulta)) { ?>
                <div class="d-flex col-6">
                    <div class="form-check form-check-info">
                        <label class="form-check-label" style="font-size: 15px;"><?= $campos['nombre_tipo']; ?>
                            <input class="form-check-input" onclick="cambiarPlaceholder(this.value);" type="radio" name="tipo" id="tipo" value="<?= $campos['id_tipo_solicitud']; ?>">
                        </label>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="formularios">
    <div class="page-header" id="info_p">
        <h5><b>Información necesaria para el desarrollo del producto:</b></h5>
        <nav aria-label="breadcrumb" id="f_evento">
            <div class="form-floating mb-2" style="width: 210px;">
                <input type="date" class="form-control" name="fecha_evento" id="datePickerId" style="font-size: 16px;">
                <label for="floatingInput" style="font-size: 18px;">Fecha del evento</label>
            </div>
        </nav>
    </div>
    <!-- Información necesaria si la solicitud no es una rueda de prensa o agenda de medios -->
    <div class="row" id="info_desarrollo1">
        <div class="col-9">
            <textarea class="form-control" name="info_desarrollo" id="info_d" rows="6" placeholder="nada" style="font-size: 15px;"></textarea>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="d-flex col-12">
                    <div class="form-floating mb-2 col-12">
                        <input type="text" class="form-control" style="font-size: 16px;" name="lugar_evento" id="lugarPicker">
                        <label for="lugarPicker" style="font-size: 18px;">Lugar</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex col-12">
                    <div class="form-floating mb-2 col-12">
                        <input type="time" class="form-control" style="font-size: 16px;" name="hora_evento" id="timePicker">
                        <label for="timePicker" style="font-size: 18px;">Hora</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información necesaria si la solicitud es una rueda de prensa o agenda de medios -->
    <div class="row" id="info_desarrollo2">
        <div class="col-6">
            <textarea class="form-control" name="info_desarrollo" rows="8" placeholder="Detallar la necesidad para la visita a medios de comunicación externos." style="font-size: 15px;"></textarea>
        </div>
        <div class="col-4">
            <textarea class="form-control" name="asistentes" rows="8" placeholder="Asistentes" style="font-size: 14px;"></textarea>
        </div>
        <div class="col-2">
            <textarea class="form-control" name="fechas" rows="8" placeholder="Fechas" style="font-size: 14px;"></textarea>
        </div>
    </div>

    <!-- Información necesaria para una solicitud de cubrimiento o entrevista -->
    <div id="info_tipo1">
        <br>
        <h5><b>Requerimientos para la solicitud:</b></h5>
        <div class="row">
            <div class="d-flex col-3">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Periodista
                        <input class="form-check-input" type="checkbox" name="requerimiento" value="Periodista">
                    </label>
                </div>
            </div>
            <div class="d-flex col-3">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Camarógrafo
                        <input class="form-check-input" type="checkbox" name="requerimiento" value="Camarógrafo">
                    </label>
                </div>
            </div>
            <div class="d-flex col-3">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Fotógrafo
                        <input class="form-check-input" type="checkbox" name="requerimiento" value="Fotógrafo">
                    </label>
                </div>
            </div>
            <div class="d-flex col-3">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Maestro(a) de Ceremonia
                        <input class="form-check-input" type="checkbox" name="requerimiento" value="Maestro(a) de Ceremonia">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 py-3" align="right" id="btn">
        <button class="btn btn-info" type="submit" style="background: linear-gradient(196deg, rgba(0,27,196,1) 0%, rgba(0,91,255,1) 100%);">Enviar Solicitud</button>
    </div>
</div>


<script>
    function cambiarPlaceholder(numero) {
        let input = document.getElementById('info_d');
        this.mostrarFormulario("formularios");
        if (numero == 6) {
            this.ocultarFormulario("info_desarrollo2");
            this.mostrarFormulario("info_desarrollo1");
            this.mostrarFormulario("info_tipo1");
            input.placeholder = "Registre el evento, actividad o entrevista a realizar, objetivo o propósito del servicio solicitado.";
        } else if (numero == 7) {
            this.ocultarFormulario("info_tipo1");
            this.ocultarFormulario("info_desarrollo2");
            this.mostrarFormulario("info_desarrollo1");
            input.placeholder = "Especifique los requerimientos específicos para la producción del video y su objetivo.";
        } else if (numero == 8) {
            this.ocultarFormulario("info_tipo1");
            this.ocultarFormulario("info_desarrollo2");
            this.mostrarFormulario("info_desarrollo1");
            input.placeholder = "Detalle los requerimientos específicos para el registro fotográfico.";
        } else if (numero == 9) {
            this.ocultarFormulario("info_tipo1");
            this.ocultarFormulario("info_desarrollo2");
            this.mostrarFormulario("info_desarrollo1");
            input.placeholder = "Especifique los requerimientos específicos para la transmisión del evento y justifique su realización.";
        } else if (numero == 10) {
            this.ocultarFormulario("info_tipo1");
            this.ocultarFormulario("info_desarrollo2");
            this.mostrarFormulario("info_desarrollo1");
            input.placeholder = "Especifique el evento que requerirá del acompañamiento de maestro de ceremonias.";
        } else {
            this.ocultarFormulario("info_desarrollo1");
            this.ocultarFormulario("info_tipo1");
            this.mostrarFormulario("info_desarrollo2");
        }
    }

    function ocultarFormulario(texto) {
        let element = document.getElementById(texto);
        element.setAttribute("hidden", "hidden");
    }

    function mostrarFormulario(texto) {
        let element = document.getElementById(texto);
        let hidden = element.getAttribute("hidden");
        element.removeAttribute("hidden");
    }

    this.ocultarFormulario("formularios");
</script>

<script>
    datePickerId.min = new Date().toISOString().split("T")[0]; // Evita que la fecha escogida sea menor a la actual.
</script>