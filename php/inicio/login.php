<?php session_start();?>
<?php
if(isset($_POST['correo']) && isset($_POST['pass'])){

$correo = $_POST["correo"];
$pass = $_POST["pass"];

include('../conexion.php');

$vercorreo =$conexion->query( "SELECT COUNT(persona.email) AS valida FROM persona WHERE persona.email='$correo'");
$valcorreo= $vercorreo->fetch_object();
if($valcorreo->valida == 0){
  
    echo json_encode(['success' =>1]);//usuario no esta registrado en el sistema

}else{
    $querycon =$conexion->query( "SELECT COUNT(persona.email) AS val FROM persona WHERE persona.email='$correo' AND persona.contrasenia = '$pass'");
    $datos= $querycon->fetch_object();

    if($datos->val == 1){
        //si el usurio es dependencia
        $infousu =$conexion->query( "SELECT persona.id_rol AS rol, persona.email FROM persona WHERE persona.email='$correo'");
        $usuinfo= $infousu->fetch_object();
        
        if($usuinfo->rol == 1){//el usurio esta registrado
            $_SESSION['correo'] = $_POST['correo'];
            echo json_encode(['success' =>2]); 
        }else{
            if($usuinfo->rol == 2){//director
                $_SESSION['correo'] = $_POST['correo'];
                echo json_encode(['success' =>3]); 
            }else{
                $_SESSION['correo'] = $_POST['correo']; //encargado
                echo json_encode(['success' =>4]); 
            }
        }
        
    }else{
        echo json_encode(['success' =>5]); //la contraseña es incorrecta
    }


}

}else{
    echo json_encode(['success' =>6]); //datos vacios
}
?>
