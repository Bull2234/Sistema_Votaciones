<?php
include("../eDemocracia_src/php/conexion_be.php");
$id_votacion = $_GET['id_votacion'];
$sql = $conexion->query("SELECT  `tipo`, `tipovotacion`,  `fecha_inicio`, `fecha_final` FROM `tipo_eleccion` WHERE id_votacion =$id_votacion");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/actualizar.css">
    <title>Actualizar Datos</title>
</head>

<body>
    <form method="post">
        <h2>Modificar datos generales votación</h2>
        <input type="hidden" name="id_votacion" value="<?= $_GET["id_votacion"] ?>">
        <?php
        include "actualizar_datos_generales_logica.php";
        while ($datos = $sql->fetch_object()) {
        ?>
            <div class="mb-3">
                <label for="titulo" class="form-label">Tipo Votacion</label>
                <input type="text" class="form-control" id="titulo" name="tipo" value="<?= $datos->tipo ?>" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">codigo votación</label>
                <input type="text" class="form-control" id="titulo" name="tipovotacion" value="<?= $datos->tipovotacion ?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?= $datos->fecha_inicio ?>" required>
            </div>
            <div class="mb-3">
                <label for="fechaFinal" class="form-label">Fecha Final</label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" value="<?= $datos->fecha_final ?>" required>
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary" name="enviar">Modificar encuesta</button>
        <button type="button" class="btn btn-secondary" onclick="location.href ='index.php';">Cancelar</button>
    </form>

</body>

</html>