<?php
$inc = include('../../php/conexion_be.php');

if ($inc) {
    $sql = "SELECT * FROM `tipo_eleccion` WHERE estado = 'Activa'";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
            <link rel="stylesheet" href="../../css/principal_usu.css">
            <title>Tipo de Elecciones</title>

        </head>

        <body>
            <div>
                <a href="../../html/usuario/login.html" class="btn btn-danger">Cerrar sesión</a>
            </div>
            <div class="container">
                <div class="main_text">
                    <h1>Votaciones Disponibles</h1>
                </div>

                <div class="body_table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID Votación</th>
                                    <th>Tipo Votación</th>
                                    <th>Estado</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Final</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $resultado->fetch_array()) {
                                    $idvo = $row['tipovotacion'];
                                    $tipo = $row['tipo'];
                                    $estado = $row['estado'];
                                    $fechai = $row['fecha_inicio'];
                                    $fechaf = $row['fecha_final'];
                                ?>
                                    <tr>
                                        <td><?php echo $idvo; ?></td>
                                        <td><?php echo $tipo; ?></td>
                                        <td><?php echo $estado; ?></td>
                                        <td><?php echo $fechai; ?></td>
                                        <td><?php echo $fechaf; ?></td>
                                        <td><a href="../administrador/votar_usuario.php?id=<?php echo $idvo; ?>" class="btn btn-warning" role="button" name="enviar">Votar</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
}
?>