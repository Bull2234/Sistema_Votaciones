<?php
include("../../php/conexion_be.php");
$id = $_GET['id'];
$sql = "DELETE FROM candidatos WHERE cod_candidato = $id";
if (mysqli_query($conexion, $sql)) {
    // Eliminación exitosa
    header("Location: index.php");
} else {
    echo "Error al eliminar: " . mysqli_error($conexion);

}

mysqli_close($conexion);

?>
