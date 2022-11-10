<?php
    if(isset($_POST["comendir"]) && isset($_POST["idsol"])){

     $comen = $_POST["comendir"];
     $id = $_POST["idsol"];
     include '../../conexion.php';

     if($comen != NULL){
        $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
        $val= $validar->fetch_object();
        if($val->num != 0){
           //comparar el motivo que llega
          $conexion->query( "UPDATE solicitud SET comendir='$comen', id_estado_solicitud='5' WHERE solicitud.id_solicitud='$id'");  
            header("location: http://localhost/umariana/php/inicio/responsable.php?var=1");
        }else{
            header("location: http://localhost/umariana/php/inicio/responsable.php?var=2");
        }

     }else{
       // echo json_encode(['success' =>3]);
         header("location: http://localhost/umariana/php/inicio/responsable.php?var=3");
     }
    }
  
?>