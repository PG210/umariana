<?php
    if(isset($_POST["correo"]) && isset($_POST["contra"])){
     $usu = $_POST["correo"];
     $pass = $_POST["contra"];

     include('conexion.php');
     include('emailcon.php');

     $sqlcon = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia = ' ' OR persona.contrasenia='0'");
     $datos=$sqlcon->fetch_object();

     if($datos->tot=='1'){
        //echo 'Registrar datos';
        //$queryUpdate =$conexion->query( "UPDATE persona SET contrasenia='$pass' WHERE persona.email='$usu'");
        $cod = rand(1000, 2000); //genera el radom
        $queryUpdate =$conexion->query( "UPDATE persona SET confir='$cod', auxpass='$pass', intento='3' WHERE persona.email='$usu'");
        email($usu, $cod); //envia los correos de registro
        echo json_encode(['success' =>1]);
         
     }else{
        $sqlcon1 = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia != ' ' ");
        $datos1=$sqlcon1->fetch_object();
        if($datos1->tot=='1'){
           // echo 'Usuario ya se encuentra registrado';
          echo  json_encode(array('success' => 2));
        }else{
           // echo 'Solicite su registro al administrador';
         echo json_encode(array('success' => 3));
        }
    }
     //var_dump($datos->tot=='0');
     /*if($datos =  $sqlcon->fetch_object()){
      echo "Usuario ya se encuentra registrado";
    }else{
      echo "debemos guardar datos";
    }*/

    }else{

        echo 'Datos vacios';

  }
  
?>