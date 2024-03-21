<?php
include("../../php/conexion_be.php");

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    // Segunda consulta para obtener la foto del candidato
    $sql2 = "SELECT foto FROM candidatos WHERE cod_candidato = ?";
    $stmt2 = mysqli_prepare($conexion, $sql2);
    mysqli_stmt_bind_param($stmt2, "i", $cod);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_bind_result($stmt2, $foto);

    // Verificar si se encontró la foto del candidato
    if (mysqli_stmt_fetch($stmt2)) {
        echo $foto;
    } else {
        echo $foto = "Null";
    }

    mysqli_stmt_close($stmt2);

    mysqli_close($conexion);
}
?>
