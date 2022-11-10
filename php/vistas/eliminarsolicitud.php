<?php
    if(isset($_POST["valor"])){

     $id= $_POST["valor"];
   
       include '../conexion.php';
        $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
        $val= $validar->fetch_object();
        if($val->num != 0){
           //comparar el motivo que llega 
               $conexion->query( "DELETE FROM solicitud  WHERE solicitud.id_solicitud='$id'"); 
               //consultar la data
               echo json_encode(['success' =>1]);
        }else{
              echo json_encode(['success' =>2]);
        }

    }
  
?>