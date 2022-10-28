<?php
    if(isset($_POST["emailrecu"])){
     $usu = $_POST["emailrecu"];

     include('conexion.php');
     include('emailcon.php');

     $sqlcon = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia != ' ' ");
     $datos=$sqlcon->fetch_object();

     if($datos->tot=='1'){
        //echo 'Registrar datos';
        //$queryUpdate =$conexion->query( "UPDATE persona SET contrasenia='$pass' WHERE persona.email='$usu'");
        $cod = rand(1000, 2000); //genera el radom
        $queryUpdate =$conexion->query( "UPDATE persona SET confir='$cod' WHERE persona.email='$usu'");
        email($usu, $cod); //envia los correos de registro
        echo json_encode(['success' =>1]);
         
     }else{
        echo json_encode(array('success' => 2));
    }

    }else{

        echo json_encode(array('success' => 3));

  }
  
?>