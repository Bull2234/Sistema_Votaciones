<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN-CANDIDATOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">SISTEMA DE VOTACIONES</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <h3>Selección de candidatos [(a) - experimental]</h3>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="seleccionaOpcion" class="form-label">Selecciona una opción:</label>
                <form action="mostrar_candidato.php" method="GET">
                    <select class="form-select" name="seleccion">
                        <?php
                        include("../../php/conexion_be.php");

                        // Consultar la base de datos para obtener las identificaciones
                        $sql = "SELECT identificacion FROM `candidatos`";
                        $resultado = mysqli_query($conexion, $sql);

                        // Mostrar las opciones en el combo
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            // Buscar el nombre y apellido correspondientes en la tabla de nombres
                            $sql_nombre = "SELECT nombres, apellidos FROM `ciudadanos` WHERE identificacion = '" . $fila['identificacion'] . "'";
                            $resultado_nombre = mysqli_query($conexion, $sql_nombre);
                            $nombre_apellido = mysqli_fetch_assoc($resultado_nombre);
                            $nombre_completo = $nombre_apellido['nombres'] . " " . $nombre_apellido['apellidos'];

                            echo "<option value='" . $fila['identificacion'] . "'>" . $nombre_completo . "</option>";
                        }

                        mysqli_close($conexion);
                        ?>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Seleccionar candidato</button>
                </form>
                <br>
                <a href="formulario_candidatos.html" class="btn btn-primary">Agregar otro candidato a la lista</a>
            </div>
        </div>
    </div>
</body>

</html>