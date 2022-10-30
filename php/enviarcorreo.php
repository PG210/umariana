<?php

require '../../PHPMailer/Exception.php'; //creo que funcuiona porque el llamado es de otra carpeta hija
require "../../PHPMailer/PHPMailer.php";
require "../../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
function correoenvio($correo, $nomsolicitud, $nomservicio, $infodes, $publicodir, $nomsol, $archivo) { 
    $cor = new PHPMailer();
    $cor->isSMTP();
    $cor->Host="smtp.gmail.com";
    $cor->Port=587;
    $cor->SMTPSecure="tls";
    $cor->SMTPAuth=true;
    $cor->Username="inesuracademico@gmail.com";
    $cor->Password="prqklemcgddwvlze";
    $cor->setFrom("inesuracademico@gmail.com");
    $cor->addAddress("$correo");
    $cor->Subject="Solicitudes";
    $cor->msgHTML("<h2 style='text-align:center;'>SOLICITUDES APP</h2>
                   <h4>SOLICITUD DE: $nomsolicitud </h4>
                   <h4>NOMBRE DEL SERVICIO: $nomservicio</h4>
                   <h4>DESCRIPCIÓN: $infodes</h4>
                   <h4>PÚBLICO DIRIJIDO: $publicodir</h4>
                   <h4>SOLICITANTE: $nomsol</h4>
                   <img src='http://localhost/umariana/php/vistas/$archivo' alt='Cargando imagen'>
    ");

    if(!$cor->send())
    echo $cor->ErrorInfo;
   
}
?>