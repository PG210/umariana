<?php
    if(isset($_POST["correorecu"]) && isset($_POST["contrarecu"])){
     $correo = $_POST["correorecu"];
     $pass = $_POST["contrarecu"];
   
     include('conexion.php');

     $querycon =$conexion->query( "SELECT COUNT(persona.email) AS val FROM persona WHERE persona.email='$correo'");
     $datos= $querycon->fetch_object();
     if($datos->val == '1'){
        
        //guardar la contraseña
        $queryActu = $conexion->query( "UPDATE persona SET contrasenia='$pass', confir=' ' WHERE persona.email='$correo'"); 
        echo json_encode(['success' =>1]);
      
     }else{
        echo json_encode(['success' =>2]);
     }

    }else{

        echo json_encode(['success' =>3]);

  }
  
?>