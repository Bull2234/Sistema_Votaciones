<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/votar_usuario.css">
  <title>Registrar Votaciones</title>
</head>

<body>
  <div>
    <br>
    <a href="../../html/usuario/login.html" class="btn btn-danger">Cerrar sesión</a>
    <a href="../usuario/principal_usuario.php" class="btn btn-success">Regresar</a>
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
          <div class="col-md-2">
            <label for="id_candidato" class="form-label">Codigo Candidato</label>
            <select class="form-select" id="id_candidato" name="id_candidato" onchange="codcandidato()">
              <?php
              include("../../php/conexion_be.php");
              if (isset($_GET['id'])) {
                $tipoVotacion = $_GET['id'];
              } else {
                echo "No se proporcionó un ID de votación.";
              }

              $sql = "SELECT cod_candidato FROM candidatos where tipovotacion = $tipoVotacion";
              $resultado = mysqli_query($conexion, $sql);

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
            <input type="text" class="form-control" id="nombre_candidato" readonly>
          </div>

          <div class="col-md-3">
            <label for="foto_candidato" class="form-label">Foto Candidato</label>
            <div id="foto_candidato"></div>
          </div>

          <div class="col-md-1">
            <label for="voto" class="form-label">Voto</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="voto" name="voto" value="si">
              <label class="form-check-label" for="voto">
                Sí
              </label>
            </div>
          </div>

          <div class="col-md-1">
            <label for="votar" class="form-label">Opción</label>
            <button type="submit" class="btn btn-warning" name="enviar" onclick="return verificarCheckbox();">Votar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Botón para agregar candidatos -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../../js/verificar_checkbox.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    function codcandidato() {
      let cod = document.getElementById('id_candidato').value;

      // Hacer una petición AJAX a PHP
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // La petición ha sido completada y la respuesta está lista
          // Aquí puedes manejar la respuesta del servidor
          document.getElementById("nombre_candidato").value = this.responseText;
        }
      };
      xhttp.open("GET", "Nombrescan.php?cod=" + cod, true);
      xhttp.send();

      // Hacer una petición AJAX para fotoscan.php
      var xhttp2 = new XMLHttpRequest();
      xhttp2.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Manejar la respuesta de fotoscan.php
          var fotoUrl = this.responseText;
          document.getElementById("foto_candidato").innerHTML = "<img src='" + fotoUrl +
            "' alt='Foto del candidato' style='width: 120px; height: 150px;'>";
        }
      };
      xhttp2.open("GET", "fotoscan.php?cod=" + cod, true);
      xhttp2.send();
    }
  </script>
</body>

</html>