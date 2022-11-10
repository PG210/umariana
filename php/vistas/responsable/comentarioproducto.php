<?php
    if(isset($_POST["comprod"]) && isset($_POST["ids"])){
      define ('SITE_ROOT', realpath(dirname(__FILE__)));
      $comen = $_POST["comprod"];
      $id = $_POST["ids"];

        include '../../conexion.php';
       
        $directorio = 'archivos/';
        $subir_archivo = $directorio.basename($_FILES['archivo']['name']);
        // move_uploaded_file($_FILES['archivo']['tmp_name'], $subir_archivo);
         move_uploaded_file($_FILES['archivo']['tmp_name'], '../'.$subir_archivo);
      
        $validar =$conexion->query( "SELECT COUNT(solicitud.id_solicitud) AS num FROM solicitud WHERE solicitud.id_solicitud='$id'");
        $val= $validar->fetch_object();
        if($val->num != 0){
        //comparar el motivo que llega 
            $conexion->query( "UPDATE solicitud SET comendir='$comen', productofinal='$subir_archivo', id_estado_solicitud='6' WHERE solicitud.id_solicitud='$id'");
            header("location: http://localhost/umariana/php/inicio/responsable.php?var=1");
           
        }else{
            header("location: http://localhost/umariana/php/inicio/responsable.php");
        }
    
    }else{
          header("location: http://localhost/umariana/php/inicio/responsable.php");
    }
  
?>