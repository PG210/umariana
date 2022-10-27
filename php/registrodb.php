<?php
   if(isset($_POST["registrobtn"])){
    if(isset($_POST["correo"]) && isset($_POST["contra"])){
     $usu = $_POST["correo"];
     $pass = $_POST["contra"];

     include('./php/conexion.php');

     $sqlcon = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia = ' '");
     $datos=$sqlcon->fetch_object();

     if($datos->tot=='1'){
        echo 'Registrar datos';
     }else{
        $sqlcon1 = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia ='$pass'");
        $datos1=$sqlcon1->fetch_object();
        if($datos1->tot=='1'){
            echo 'Usuario ya se encuentra registrado';
        }else{
            echo 'Solicite su registro al administrador';
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
  }
?>