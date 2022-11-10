<?php
    if(isset($_POST["soltipo"]) && isset($_POST["fechai"]) && isset($_POST["fechaf"]) ){

     $id= $_POST["soltipo"];
     $fechai = $_POST["fechai"];
     $fechaf = $_POST["fechaf"];

     include '../../conexion.php';
   
     if($id == 1){
        if($fechai != NULL && $fechaf != NULL){
            $result1 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=1");
            $result2 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=2");
            $result3 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=3");
            $result4 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND  solicitud.id_tipo_solicitud=4");
            $result5 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=5");
            
        }else{
            $result1 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=1");
            $result2 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=2");
            $result3 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=3");
            $result4 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=4");
            $result5 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=5");
        }
        $val1= $result1->fetch_object();
        $val2= $result2->fetch_object();
        $val3= $result3->fetch_object();
        $val4= $result4->fetch_object();
        $val5= $result5->fetch_object();
        $info = array(0=>$val1, 1=>$val2, 2=>$val3, 3=>$val4, 4=>$val5);
       
     }else{
        if($fechai != NULL && $fechaf != NULL){
            $result6 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=6");
            $result7 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=7");
            $result8 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=8");
            $result9 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=9");
            $result10 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=10 ");
            $result11 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE fecha_solicitud BETWEEN '$fechai' AND '$fechaf' AND solicitud.id_tipo_solicitud=11");
        }else{
            $result6 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=6");
            $result7 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=7");
            $result8 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=8");
            $result9 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=9");
            $result10 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=10");
            $result11 = $conexion->query("SELECT COUNT(DISTINCT id_solicitud) AS total, tipo_solicitud.nombre_tipo   FROM solicitud JOIN tipo_solicitud ON solicitud.id_tipo_solicitud = tipo_solicitud.id_tipo_solicitud WHERE solicitud.id_tipo_solicitud=11");

        }
        $val6= $result6->fetch_object();
        $val7= $result7->fetch_object();
        $val8= $result8->fetch_object();
        $val9= $result9->fetch_object();
        $val10= $result10->fetch_object();
        $val11= $result11->fetch_object();

        $info = array(0=>$val6,
        1=>$val7, 2=>$val8, 3=>$val9, 4=>$val10, 5=>$val11);
    }
     
     echo json_encode($info);
    }
  
?>