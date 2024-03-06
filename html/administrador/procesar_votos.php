<?php
include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");

boton($conexion);


function insertar($conexion)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos enviados desde el formulario
        $idVotante = mysqli_real_escape_string($conexion, $_POST["id_votante"]); // Evita inyección SQL
        $idCandidato = mysqli_real_escape_string($conexion, $_POST["id_candidato"]);

        $voto = "No"; // Valor predeterminado
        if (isset($_POST["voto"]) && $_POST["voto"] === "si") {
            $voto = "Sí";
        }

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO votos (id_votante, id_candidato, voto) VALUES ('$idVotante', '$idCandidato', '$voto')";
        if (mysqli_query($conexion, $sql)) {
            mysqli_close($conexion);
            header("Location: ../usuario/principal_usuario.php");
            exit; // Importante: Terminar el script después de redireccionar
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    }
}




function boton($conexion)
{
    ////obtener la validacion del botons
    if (isset($_POST['enviar'])) {
        insertar($conexion);
    } else {
        header("Location: votar.php");
    }
}
