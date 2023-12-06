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
 
    <title>ADMIN-CANDIDATOS</title>
 
</head>
<body style="background-color: #F0F8FF;">
 
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand">SISTEMA DE VOTACIONES</a>
 
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>
 
 
    </nav>
 
    <!-- Content Section -->
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12 row">
                <div class="col-md-10 col-xs-12">
                    <h3>LISTADO DE CANDIDATOS</h3>
                </div>
                <div class="col-md-2 col-xs-12">
               <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <a class="btn btn-warning"href="formulario_candidatos.html">AGREAGAR</a>
                  <a href="index.php" class="btn btn-info" >REGRESAR</a>
            </div>
                </div>
            </div>
            
        </div>
  <div class="container mt-5">
      <table class="table">
          <thead class="thead-dark">
              <tr>
                 <th>Codigo Candidato</th>
                  <th>Idetificacion</th>
                  <th>codpartido</th>
                  <th>Tipo Votacion</th>
                  <th>Opciones</th>
              </tr>
          </thead>
          <tbody>
            <?php
include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");
 
// Obtener el valor 'tipo' desde la URL
$nom = $_GET['tipo'];
 
// Consultar la tabla 'tipo_votacion' para obtener el 'cod_votacion' correspondiente al tipo
$sql_tipo = "SELECT cod_votacion FROM tipo_votacion WHERE tipo_votacion = '$nom'";
$resultado_tipo = mysqli_query($conexion, $sql_tipo);
 
if ($resultado_tipo) {
    $fila_tipo = mysqli_fetch_assoc($resultado_tipo);
    $tipo = $fila_tipo['cod_votacion'];
 
    // Utilizar el 'cod_votacion' para consultar la tabla 'candidatos'
    $sql_candidatos = "SELECT * FROM candidatos WHERE tipovotacion = '$tipo'";
    $resultado_candidatos = mysqli_query($conexion, $sql_candidatos);
 
    // Aquí puedes realizar las operaciones necesarias con los datos de los candidatos
    
            // Mostrar los registros en la tabla
            while ($fila = mysqli_fetch_assoc($resultado_candidatos)) {
                echo "<tr>";
                     echo "<td>" . $fila['cod_candidato'] . "</td>";
                     echo "<td>" . $fila['identificacion'] . "</td>";
                    
                     echo "<td>" . $fila['codpartido'] . "</td>";
                     echo "<td>" . $fila['tipovotacion'] . "</td>";
                     echo "<td><button class='btn btn-danger' onclick='eliminarFila(" . $fila['cod_candidato'] . ")'>Eliminar</button>";
                 echo "</tr>";
                  }
                 mysqli_close($conexion);
} else {
    // Manejar el caso en el que no se encuentre el tipo de votación
    echo "Tipo de votación no encontrado.";
}
 
              ?>
          </tbody>
      </table>
  </div>
 
</body>
<script>
function eliminarFila(id) {
    if (confirm("¿Estás seguro de que deseas eliminar esta fila?")) {
        window.location.href = "eliminar_candidato.php?id=" + id; // Redirecciona a eliminar.php con el ID
    }
}
 
function actualizarFila(id) {
    if (confirm("¿Estás seguro de que deseas eliminar esta fila?")) {
        window.location.href = "actualizar.php?id=" + id;
    }
}
 
</script>
</html>
 