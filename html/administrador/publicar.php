<?php
include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta el estado actual de la votación
    $sql_estado = "SELECT estado FROM tipo_eleccion WHERE id_votacion = $id";
    $resultado = mysqli_query($conexion, $sql_estado);
    $fila = mysqli_fetch_assoc($resultado);

    if ($fila['estado'] === 'Activa') {
        header("location:index.php");
    } else {
        // Actualiza el estado de la votación
        $sql = "UPDATE tipo_eleccion SET estado = 'Activa' WHERE id_votacion = $id";
        if (mysqli_query($conexion, $sql)) {
            header("location:index.php");
        } else {
            echo "Error al actualizar el atributo: " . mysqli_error($conexion);
        }
    }
} else {
    echo "ID no proporcionado.";
}

mysqli_close($conexion);
?>
