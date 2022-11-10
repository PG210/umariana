<?php
    if(isset($_POST["comencargado"]) && isset($_POST["idsolicitud"])){

     $comen = $_POST["comencargado"];
     $id = $_POST["idsolicitud"];

     include '../conexion.php';
    if($comen != NULL){
        $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
        $val= $validar->fetch_object();
        if($val->num != 0){
           //comparar el motivo que llega
          
          $conexion->query( "UPDATE solicitud SET comencargado='$comen' WHERE solicitud.id_solicitud='$id'");  
          header("location: http://localhost/umariana/php/inicio/director.php?var=1");
        }else{
            header("location: http://localhost/umariana/php/inicio/director.php?var=2");
        }

     }else{
       // echo json_encode(['success' =>3]);
       header("location: http://localhost/umariana/php/inicio/director.php?var=3");
     }
    }
  
?>