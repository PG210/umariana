<?php 
if(isset($_POST["comcancel"]) && isset($_POST["idcancelar"])){
$comentario= $_POST["comcancel"];
$id = $_POST["idcancelar"];
include '../../conexion.php';
//retornar información
$validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
$val= $validar->fetch_object();
if($val->num != 0){
       //comparar el motivo que llega 
       $conexion->query( "UPDATE solicitud SET motivo_cancelacion='$comentario', id_estado_solicitud='8' WHERE solicitud.id_solicitud='$id'");
       header("location: http://localhost/umariana/php/inicio/usuario.php");
}else{
    header("location: http://localhost/umariana/php/inicio/usuario.php");
}

}
?>
