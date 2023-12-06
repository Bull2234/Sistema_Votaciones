<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #CCFFFF;
  }
 
  .container {
    margin-top: 100px;
  }
 
  .form-header {
    background-color: #343a40;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 24px;
    border-radius: 5px 5px 0 0;
  }
 
  .form-label {
    font-weight: bold;
  }
 
  .btn-primary {
    background-color: #007bff;
    border: none;
  }
</style>
 
<script>
  function verificarCheckbox() {
    var checkbox = document.getElementById("voto");
    if (!checkbox.checked) {
      alert("Por favor, seleccione el checkbox 'Voto' antes de enviar.");
      return false;
    }else{
      alert("EXITO. Voto Registrado?");
      return true;
    }
    
  }
</script>
 
<title>Registrar Votaciones</title>
</head>
<body>
  <div>
    <a href="../../html/usuario/login.html" class="btn btn-danger">Cerrar</a>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="form-header">
          Realiza Tu Votación <br>
          Seleciona Tu Candidato
        </div>
        <form action="procesar_votos.php" method="post" class="row g-3 align-items-center p-4 border rounded bg-light">
          <div class="col-md-2">
            <label for="id_votante" class="form-label">ID Votante</label>
            <input type="text" class="form-control" id="id_votante" maxlength="10" name="id_votante" required>
          </div>
          <div class="col-md-3">
            <label for="id_candidato" class="form-label">ID Candidato</label>
                <?php
                include("C:/xampp/htdocs/eDemocracia_src/php/conexion_be.php");
                
                $sql = "SELECT cod_candidato FROM candidatos";
                $resultado=mysqli_query($conexion, $sql);
                ?>
              <select class="form-select" id="id_candidato" name="id_candidato">
              <?php    
                // Mostrar las opciones en el menú desplegable
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $fila['cod_candidato'] . "'>" . $fila['cod_candidato'] . "</option>";
 
                }
            
                mysqli_close($conexion);
                ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="nombre_candidato" class="form-label">Nombre Candidato</label>
            <select class="form-select" id="nombre_candidato">
            <?php
                            include("C:/xampp/htdocs/xampp/Democracia/html/conexion.php");
                            
                            $sql = "SELECT c.nombres, c.apellidos
                                    FROM ciudadanos c
                                    INNER JOIN candidatos ca ON c.identificacion = ca.identificacion";
                            
                            $resultado = mysqli_query($conexion, $sql);
                        
                            // Mostrar las opciones en el menú desplegable
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $nombreCompleto = $fila['nombres'] . " " . $fila['apellidos'];
                                echo "<option value='nombre_candidato'>" . $nombreCompleto . "</option>";
                            }
                        
                            mysqli_close($conexion);
                            ?>
            </select>
          </div>
          <div class="col-md-2">
            <label for="voto" class="form-label">Voto</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="voto" name="voto" value="si">
              <label class="form-check-label" for="voto">
                Sí
              </label>
            </div>
          </div>
          <div class="col-md-2">
          <button type="submit" class="btn btn-warning" name="enviar" btn btn-primary btn-block" onclick="return verificarCheckbox();">Votar</button>          
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>