<?php 
if(isset($_POST["fechaevdos"]) && isset($_POST["comfecha"]) && isset($_POST["idsolicitud"])){
$comentario= $_POST["comfecha"];
$fecha= $_POST["fechaevdos"];
$id = $_POST["idsolicitud"];
include '../../conexion.php';
//retornar información
$validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
$val= $validar->fetch_object();
if($val->num != 0){
   //comparar el motivo que llega 
       $conexion->query( "UPDATE solicitud SET motivo_edicion='$comentario', fecha_evento ='$fecha', id_estado_solicitud='2' WHERE solicitud.id_solicitud='$id'");
       header("location: http://localhost/umariana/php/inicio/usuario.php");
}else{
    header("location: http://localhost/umariana/php/inicio/usuario.php");
}

}
?>
