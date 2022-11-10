<?php

require '../../PHPMailer/Exception.php'; //creo que funcuiona porque el llamado es de otra carpeta hija
require "../../PHPMailer/PHPMailer.php";
require "../../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
function recoemail($correo, $nomsolicitud, $nomservicio, $infodes, $publicodir, $nomsol, $archivo, $fecha_evento, $fechas_evento, $lugar, $reque, $asistentes, $hora) { 
    $cor = new PHPMailer();
    $cor->isSMTP();
    $cor->Host="smtp.gmail.com";
    $cor->Port=587;
    $cor->SMTPSecure="tls";
    $cor->SMTPAuth=true;
    $cor->Username="solicitudunimar@gmail.com";
    $cor->Password="roboywzgpgkufkyu";
    $cor->setFrom("solicitudunimar@gmail.com");
    $cor->addAddress("$correo");
    $cor->Subject="Solicitudes";
    $cor->msgHTML("<h2 style='text-align:center;'>RECORDAR SOLICITUD</h2>
        <h4>SOLICITUD DE: $nomsolicitud </h4>
        <h4>NOMBRE DEL SERVICIO: $nomservicio</h4>
        <h4>DESCRIPCION: $infodes</h4>
        <h4>PUBLICO DIRIJIDO: $publicodir</h4>
        <h4>SOLICITANTE: $nomsol</h4>
        <h4>FECHA DEL EVENTO: $fecha_evento</h4>       
    ");
    
    if(!$cor->send())
    echo $cor->ErrorInfo;
   
}
?>