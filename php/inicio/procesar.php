<?php
   if(isset($_POST["soltipo"])){
    $tipo = $_POST["soltipo"];
	include('../conexion.php');

    $dat =$conexion->query("SELECT COUNT(tipo_solicitud.id_tipo_solicitud) AS conta FROM tipo_solicitud");
    $con= $dat->fetch_object();
    
    
    $querycon = array();
    for($i=0; $i<$con->conta; $i++){
       
            $querycon =$conexion->query("SELECT  tipo_solicitud.nombre_tipo FROM solicitud  JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud = '$i' LIMIT 1");
       
      
    }
   $datos= $querycon->fetch_object();
   echo json_encode(['success' =>$datos]);
   // echo json_encode(['success' =>$querycon]);
   
}
?>