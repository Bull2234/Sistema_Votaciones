<?php
include("../../php/conexion_be.php");

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];

    // Primera consulta para obtener el nombre del candidato
    $sql1 = "SELECT c.nombres, c.apellidos
            FROM ciudadanos c
            INNER JOIN candidatos ca ON c.identificacion = ca.identificacion 
            WHERE ca.cod_candidato = ?";

    $stmt1 = mysqli_prepare($conexion, $sql1);
    mysqli_stmt_bind_param($stmt1, "i", $cod);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_bind_result($stmt1, $nombres, $apellidos);

    // Verificar si se encontró el candidato y obtener su nombre completo
    if (mysqli_stmt_fetch($stmt1)) {
        $nombreCompleto = $nombres . " " . $apellidos;
        echo $nombreCompleto;
    } else {
        $nombreCompleto = 'No se encontró el candidato';
        echo  $nombreCompleto;
    }

    mysqli_stmt_close($stmt1);
    mysqli_close($conexion);
}
