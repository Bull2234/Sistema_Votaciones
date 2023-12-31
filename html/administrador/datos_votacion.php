<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Votación</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: grey;
        }

        .login-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #d6d6d6;
            border-radius: 5px;
            background-color: #CCFFFF;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2 class="text-center mb-4">Formulario de Votación</h2>
        <form action="guardar.php" method="post">
            <div class="mb-3">
                <label for="idvot" class="form-label">Codigo Votacion</label>
                <?php
                include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");
                $sql = "SELECT cod_votacion FROM tipo_votacion";
                $resultado = mysqli_query($conexion, $sql);
                ?>
                <select class='form-select' id='idvot' name='idvot'>
                    <?php
                    // Mostrar las opciones en el menú desplegable
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila['cod_votacion'] . "'>" . $fila['cod_votacion'] . "</option>";
                    }
                    mysqli_close($conexion);
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Identificacion</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Tipo Votacion</label>
                <?php
                include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");
                $sql = "SELECT tipo_votacion FROM tipo_votacion";
                $resultado = mysqli_query($conexion, $sql);
                ?>
                <select class='form-select' id='titulo' name='titulo'>
                    <?php
                    // Mostrar las opciones en el menú desplegable
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila['tipo_votacion'] . "'>" . $fila['tipo_votacion'] . "</option>";
                    }
                    mysqli_close($conexion);
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado">
                    <option value="Activa">Activo</option>
                    <option value="Inactiva">Inactivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
            </div>
            <div class="mb-3">
                <label for="fechaFinal" class="form-label">Fecha Final</label>
                <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
            </div>
            <button type="submit" class="btn btn-primary" name="enviar">Guardar</button>
            <button type="button" class="btn btn-secondary" onclick="location.href ='index.php';">Cancelar</button>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS (opcional, para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>