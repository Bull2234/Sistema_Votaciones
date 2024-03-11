<?php
include("../../php/conexion_be.php");
boton($conexion);


function insertar($conexion){
	// Obtener los datos del formulario
	$id = $_POST['identificacion'];
	$nom = $_POST['ide'];
    $cod = $_POST['codpartido'];
    $tipo_votacion = $_POST['tipovotacion'];
	$imagen = '';
	if(isset($_FILES['foto'])){
		// Guardar la foto en el servidor y obtener su nombre temporal
        $file = $_FILES["foto"];
		$tipo = $file["type"]; // Obtener el tipo MIME del archivo
		$nombre = $file["name"];
		$ruta_provisional = $file["tmp_name"];
		$carpeta = "Fotos/"; // Carpeta en donde guardaremos	 las imágenes
		if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
			echo "<script>alert('Error al cargar la foto');</script>";
		}else{
			$src = $carpeta.$nombre; 
			move_uploaded_file($ruta_provisional, $src);
			$imagen = "Fotos/".$nombre;
		}
	}

	// Insertar los datos en la base de datos
  $sql = "INSERT INTO candidatos (cod_candidato, identificacion, foto, codpartido, tipovotacion) VALUES
                             ('$id', '$nom', '$imagen', '$cod', '$tipo_votacion')";

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
