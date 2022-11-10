<?php
    if(isset($_POST["ideditar"])){
    
     include '../../conexion.php';
     //include '../enviarcorreo.php'; 
       
     //formulario uno
     $desolicitud = $_POST["desolicitud"];
     $fechaev = $_POST["fechaev"];
     $publico =  $_POST["publico"];
     $lugar = $_POST["lugar"];
     $reque = $_POST["reque"];
     $asis = $_POST["asis"];
     $desanexo = $_POST["desanexo"];
     $id = $_POST["ideditar"];
     $arch = $_POST["archivo"];
    
     //copiar la imagen a la carpeta archivos y guardar en la base de datos
     if($arch != NULL){
        $directorio = 'archivos/';
        $subir_archivo = $directorio.basename($_FILES['archivo']['name']);
         move_uploaded_file($_FILES['archivo']['tmp_name'], $subir_archivo);
     }
     
    $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
    $val= $validar->fetch_object();
    if($val->num != 0){
    //comparar el motivo que llega 
        $conexion->query( "UPDATE solicitud SET  fecha_evento ='$fechaev', lugar_evento='$lugar', publico_objetivo='$publico', anexos='$subir_archivo', 
                             descripcion_anexo='$desanexo', requerimientos='$reque',  asistentes='$asis', informacion_desarrollo='$desolicitud', id_estado_solicitud='2' WHERE solicitud.id_solicitud='$id'");
       
       header("location: http://localhost/umariana/php/inicio/usuario.php");
    }else{
        header("location: http://localhost/umariana/php/inicio/usuario.php");
    }
    
    }
  
?>