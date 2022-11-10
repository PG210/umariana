<?php
 
//recuperamos las variables enviadas por ajax

$valor = filter_input(INPUT_POST, 'valor');
include '../conexion.php';

//Las utilizamos como necesitemos
/*$data = array(
  'res' => ($num1 + $num2)
);*/

$validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$valor'");
$val= $validar->fetch_object();
if($val->num != 0){
   //comparar el motivo que llega
       $conexion->query( "UPDATE solicitud SET  id_estado_solicitud='8' WHERE solicitud.id_solicitud='$valor'"); 
       echo json_encode(['success' =>3]);
}else{
       echo json_encode(['success' =>4]);
}
 
?>