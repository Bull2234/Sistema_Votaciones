<?php
include("../../php/conexion_be.php");
boton($conexion);

function validar($conexion)
{
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Consultar la base de datos para validar el ID
        $sql = "SELECT * FROM ciudadanos WHERE identificacion = '$id'";
        $result = mysqli_query($conexion, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>';
            echo '  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">';
            echo "<body style='background-color: 72A0C1;'>";
            echo "<div class='container mt-5' style='background-color: C9FFE5; text-align: center;'>";
            echo "<h2>Datos Del Votante</h2>";
            echo "<table class='table'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th style='color: blue;'>Identificacion</th>";
            echo "<th style='color: blue;'>Nombres</th>";
            echo "<th style='color: blue;'>Apellidos</th>";
            echo "<th style='color: blue;'>Correo</th>";
            echo "<th style='color: blue;'>Sexo</th>";
            echo "<th style='color: blue;'>Edad</th>";
            echo "</tr>";
            echo "</thead>";

            echo "<tbody>";
            while ($arr = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $arr['identificacion'] . "</td>";
                echo "<td>" . $arr['nombres'] . "</td>";
                echo "<td>" . $arr['apellidos'] . "</td>";
                echo "<td>" . $arr['correo'] . "</td>";
                echo "<td>" . $arr['sexo'] . "</td>";
                echo "<td>" . $arr['edad'] . "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo '<div class="d-flex justify-content-center mt-3">';
            echo '<a href="principal_usuario.php" class="btn btn-primary">Ok</a>';
            echo '</div>';

            echo "</div>";
            echo "</body>";
            mysqli_close($conexion);
        } else {
            mysqli_close($conexion);
            header("Location: login.html");
        }
    }
}

function boton($conexion)
{
    if (isset($_POST['ingresar'])) {
        validar($conexion);
    } else {
        header("Location: login_votante.html");
    }
}
