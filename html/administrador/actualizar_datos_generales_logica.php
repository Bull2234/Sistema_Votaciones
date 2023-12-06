<?php
if (isset($_POST['enviar'])) {
    $id_votacion=$_POST["id_votacion"];
    $tipo=$_POST["tipo"];
    $fechaInicio=$_POST["fechaInicio"];
    $fechaFinal=$_POST["fechaFinal"];
    $tipovotacion=$_POST["tipovotacion"];
    $sql=$conexion->query("UPDATE `tipo_eleccion` SET `tipo`='$tipo',`fecha_inicio`='$fechaInicio',`fecha_final`='$fechaFinal', `tipovotacion`='$tipovotacion' WHERE  id_votacion=$id_votacion");
    if($sql==1){
        header("location:index.php");
    }else{
        echo '[error - critic]';
    }
} 
?>