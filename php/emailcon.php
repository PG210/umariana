<?php

require "../PHPMailer/Exception.php";
require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function email($correo, $cod) {

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
    $cor->Subject="Confirmar Registro";
    $cor->msgHTML("<h4>Código de acceso:</h4> $cod");

    if(!$cor->send())
    echo $cor->ErrorInfo;
   
}
?>