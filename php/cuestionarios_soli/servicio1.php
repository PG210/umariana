<!--Tipos de solicitud-->
<div id="tipo_s">
    <div class="d-flex py-2">
        <div class="col-12 row">
            <!--Tipo de solicitud-->
            <h5><b>Tipo de solicitud:</b></h5>
            <?php
            //crear una variable con la sentencia SQL
            $id_servicio = 1;
            $sql = "SELECT * FROM tipo_solicitud WHERE id_tipo_servicio=$id_servicio";
            // crear la variable para ejecutar la consulta
            $consulta = mysqli_query($conexion, $sql);
            while ($campos = mysqli_fetch_array($consulta)) { ?>
                <div class="d-flex col-4 py-1">
                    <div class="form-check form-check-info">
                        <label class="form-check-label"  style="font-size: 15px;"><?= $campos['nombre_tipo']; ?>
                            <input class="form-check-input" type="radio" name="tipo" value="<?= $campos['id_tipo_solicitud']; ?>">
                        </label>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div>
    <div class="page-header py-2">
        <h5><b>Información necesaria para el desarrollo del producto:</b></h5>
        <nav aria-label="breadcrumb">
            <div class="form-floating" style="width: 210px;">
                <input type="date" class="form-control" name="fechaevento" id="datePickerId2" style="font-size: 16px;">
                <label for="floatingInput" style="font-size: 18px;">Fecha del evento</label>
            </div>
        </nav>
    </div>
    <textarea class="form-control" name="infodes" rows="6" placeholder="Detallar la información para el desarrollo del producto solicitado." style="font-size: 15px;"></textarea>
    <br>
</div>

<div class="row">
    <div class="col-3 mb-2">
        <br>
        <h5><b>Público Objetivo:</b></h5>
        <div class="row">
            <div class="d-flex col-6">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Interno
                        <input class="form-check-input" type="radio" name="publico" value="Interno">
                    </label>
                </div>
            </div>
            <div class="d-flex col-6">
                <div class="form-check form-check-info">
                    <label class="form-check-label" style="font-size: 15px;">Externo
                        <input class="form-check-input" type="radio" name="publico" value="Externo">
                    </label>
                </div>
            </div>
            <div class="d-flex col-12 py-3">
                <!-- aqui boton-->
            </div>
        </div>
    </div>

    <div class="col-9">
        <br>
        <h5><b>Anexos:</b></h5> <br>
        <div class="row">
            <div class="d-flex col-8">
                <textarea class="form-control" name="desc_anexo" rows="4" placeholder="Describa el anexo que adjunta." style="font-size: 15px;"></textarea>
            </div>
            <div class="d-flex col-4">
                <!--<input class="form-control" type="file" id="anexos" name="anexos">-->
                <input class="form-control" name="subir_archivo" type="file" />
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-12"><button class="btn btn-info" type="submit" style="margin-left: 8px; background: linear-gradient(196deg, rgba(0,27,196,1) 0%, rgba(0,91,255,1) 100%);">Enviar Solicitud</button>
           </div>
    </div>
</div>

<script>
    datePickerId2.min = new Date().toISOString().split("T")[0]; // EVita que la fecha escogida sea menor a ala actual.
</script>