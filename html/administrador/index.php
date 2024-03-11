<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
                alert("Debes iniciar sesión ");
                window.location = "login.php";
            </script>';
    session_destroy();
    die();
}


?>
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
    <title>ADMIN-Encuestas</title>

</head>

<body style="background-color: #F0F8FF;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Sistema de Votaciones</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>


    </nav>

    <!-- Content Section -->
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <h3>TIPO DE VOTACIÒN</h3>
                    <a href="../../php/cerrar_sesion.php" class="btn btn-info">cerrar sesión</a>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="datos_votacion.php" class="btn btn-warning"> AGREGAR VOTACIONES</a>
                        <a href="conteo_votos.php" class="btn btn-info">TOTAL VOTOS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Votación</th>
                        <th>ID Administrador</th>
                        <th>Típo Votacion</th>
                        <th>Estado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../../php/conexion_be.php");

                    // Consultar la base de datos para validar el ID
                    $sql = "SELECT * FROM tipo_eleccion";
                    $resultado = mysqli_query($conexion, $sql);

                    // Mostrar los registros en la tabla
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['id_votacion'] . "</td>";
                        echo "<td>" . $fila['id_admin'] . "</td>";
                        echo "<td><a class='btn btn-success' onclick=\"mostrarcandidatos('" . $fila['tipo'] . "')\">" . $fila['tipo'] . "</a></td>";
                        echo "<td>" . $fila['estado'] . "</td>";
                        echo "<td>" . $fila['fecha_inicio'] . "</td>";
                        echo "<td>" . $fila['fecha_final'] . "</td>";
                        echo "<td><button class='btn btn-danger' onclick='eliminarFila(" . $fila['id_votacion'] . ")'>Eliminar</button>
                        <a href='actualizar.php?id_votacion=" . $fila['id_votacion'] . "' class='btn btn-primary'>Actualizar</a>
                        <button class='btn btn-success' onclick='Publicar(" . $fila['id_votacion'] . ")'>Publicar</button>";
                        echo "</tr>";
                    }
                    mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
        <script src="../../js/index.js"></script>
</body>
</html>