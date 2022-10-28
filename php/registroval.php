<?php
    if(isset($_POST["c"]) && isset($_POST["o"]) && isset($_POST["d"]) && isset($_POST["e"])){
     $c = $_POST["c"];
     $o = $_POST["o"];
     $d = $_POST["d"];
     $e = $_POST["e"];
     $codigo =$c.$o.$d.$e; //concatena el codigo para hacer la comparacion

     include('conexion.php');

     $querycon =$conexion->query( "SELECT COUNT(persona.email) AS val FROM persona WHERE persona.confir='$codigo'");
     $datos= $querycon->fetch_object();
     if($datos->val == '1'){
        //obtener los datos de la base de datos
        $querydat =$conexion->query( "SELECT persona.email, persona.auxpass FROM persona WHERE persona.confir='$codigo'");
        $reg=  $querydat->fetch_object();
        //guardar la contraseña
        $queryActu = $conexion->query( "UPDATE persona SET contrasenia='$reg->auxpass', auxpass=' ', confir=' ' WHERE persona.email='$reg->email'"); 
        
        echo json_encode(['success' =>1]);
      
     }else{
        echo json_encode(['success' =>2]);
     }

    

     //$sqlcon = $conexion->query("SELECT COUNT(persona.email) AS tot from persona WHERE persona.email = '$usu' AND persona.contrasenia = ' ' OR persona.contrasenia='0'");
     //$datos=$sqlcon->fetch_object();

     //if($datos->tot=='1'){
        //echo 'Registrar datos';
        //$queryUpdate =$conexion->query( "UPDATE persona SET contrasenia='$pass' WHERE persona.email='$usu'");
       // $cod = rand(1000, 2000); //genera el radom
        //$queryUpdate =$conexion->query( "UPDATE persona SET confir='$cod', auxpass='$pass' WHERE persona.email='$usu'");
        //email($usu, $cod); //envia los correos de registro
        //echo json_encode(['success' =>1]);
         
     //}else{
        
    // }
    }else{

        echo json_encode(['success' =>3]);

  }
  
?>