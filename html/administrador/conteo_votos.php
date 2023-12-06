<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Favicon - FIS -->

    <title>CONTEO_VOTOS</title>

</head>

<body style="background-color: #F0F8FF;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">SISTEMA DE VOTACIONES</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <!-- Content Section -->
    <div class="container" style="margin-top: 30px; background-color: maya blue;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <br>
                    <h3>TOTAL DE VOTOS POR CANDIDATO</h3>
                </div>
                <div class="col-md-2 col-xs-12">
                    <br>
                    <a href="index.php" class="btn btn-warning">REGRESAR</a>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Total Votos</th>
                        <th>Voto</th>
                        <th>Tipo Votacion</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Codigo Partido</th>
                        <th>Codigo Candidato</th>
                        <th>Idetificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");


                    // Consultar la base de datos para validar el ID
                    $sql = "SELECT * FROM consulta_total_votos;
";
                    $resultado = mysqli_query($conexion, $sql);

                    // Mostrar los registros en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['total_votos'] . "</td>";
                        echo "<td>" . $fila['voto'] . "</td>";
                        echo "<td>" . $fila['tipo_votacion'] . "</td>";
                        echo "<td>" . $fila['depto'] . "</td>";
                        echo "<td>" . $fila['mcpio'] . "</td>";
                        echo "<td>" . $fila['codpartido'] . "</td>";
                        echo "<td>" . $fila['id_candidato'] . "</td>";
                        echo "<td>" . $fila['identificacion'] . "</td>";
                        echo "<td>" . $fila['nombres'] . "</td>";
                        echo "<td>" . $fila['apellidos'] . "</td>";
                        echo "</tr>";
                    }
                    mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>

</body>
<script>


</script>

</html>