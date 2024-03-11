<?php
include("../eDemocracia_src/php/conexion_be.php");
boton($conexion);


function insertar($conexion){
	// Obtener los datos del formulario
	$idvot = $_POST['idvot'];
	$id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $estado = $_POST['estado'];
    $fechainicio = $_POST['fechaInicio'];
    $fechafin = $_POST['fechaFinal'];

	// Insertar los datos en la base de datos
  $sql = "INSERT INTO tipo_eleccion (tipovotacion, id_admin, tipo, estado, fecha_inicio, fecha_final) VALUES
                             ('$idvot', '$id', '$titulo', '$estado', '$fechainicio', '$fechafin')";

	mysqli_query($conexion, $sql);
	mysqli_close($conexion);
	header("Location: index.php");
}


function boton($conexion){
	////obtener la validacion del boton
	if(isset($_POST['enviar'])){
		insertar($conexion);

	}
	else{
	header("Location: datos_votacion.php");
	}
}



?>
