<?php
 
//recuperamos las variables enviadas por ajax

$iden = filter_input(INPUT_POST, 'id');
include '../conexion.php';

//Las utilizamos como necesitemos
/*$data = array(
  'res' => ($num1 + $num2)
);*/

$validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$iden'");
$val= $validar->fetch_object();
if($val->num != 0){
   //comparar el motivo que llega
       $conexion->query( "UPDATE solicitud SET  id_estado_solicitud='2' WHERE solicitud.id_solicitud='$iden'"); 
       echo json_encode(['success' =>1]);
}else{
       echo json_encode(['success' =>2]);
}
 
?>