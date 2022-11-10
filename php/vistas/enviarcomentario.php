<?php
    if(isset($_POST["textocomen"]) && isset($_POST["motivo"]) && isset($_POST["correo"]) && isset($_POST["iden"])){

     $comen = $_POST["textocomen"];
     $motivo = $_POST["motivo"];
     $correo = $_POST["correo"];
     $id = $_POST["iden"];
   
     include '../conexion.php';
    if($comen != NULL){
        $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
        $val= $validar->fetch_object();
        if($val->num != 0){
           //comparar el motivo que llega
           if($motivo == 1){
               $conexion->query( "UPDATE solicitud SET motivo_edicion='$comen', id_estado_solicitud='3' WHERE solicitud.id_solicitud='$id'"); 
           }else{
               $conexion->query( "UPDATE solicitud SET motivo_cancelacion='$comen', id_estado_solicitud='8' WHERE solicitud.id_solicitud='$id'"); 
           }
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