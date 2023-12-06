<?php
include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");

boton($conexion);


function insertar($conexion){
	// Obtener los datos del formulario
	$id = $_POST['identificacion'];
	$nom = $_POST['ide'];
    $foto = $_POST['foto'];
    $cod = $_POST['codpartido'];
    $tipo = $_POST['tipovotacion'];

	// Insertar los datos en la base de datos
  $sql = "INSERT INTO candidatos (cod_candidato, identificacion, foto, codpartido, tipovotacion) VALUES
                             ('$id', '$nom', '$foto', '$cod', '$tipo')";

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
