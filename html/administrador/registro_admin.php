<?php

include("../eDemocracia_src/php/conexion_be.php");
$nombre_completo = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$correo = $_POST['correo'];
$contrasena = $_POST['passwordd'];
$contrasena_h = hash('sha512', $contrasena);

$query = "INSERT INTO administrador (nombre, identificacion, correo, pasword) VALUES
    ('$nombre_completo','$identificacion','$correo','$contrasena')";
//validar que no se repita información sensible como el numero de cédula [error]
$verificar_identificacion = mysqli_query($conexion, "SELECT * FROM administrador WHERE identificacion = $identificacion");
$verificar_identificacion_dos = mysqli_query($conexion, "SELECT `identificacion` FROM `ciudadanos` WHERE identificacion = $identificacion");
if (mysqli_num_rows($verificar_identificacion) > 0) {
    echo '
            <script>
                alert("ERROR : El número de identificación ya está registrado");
                window.location = "../administrador/registro.html";
            </script>';
    exit();
}
if (mysqli_num_rows($verificar_identificacion_dos) > 0) {
    echo '
            <script>
                alert("ERROR : Usted NO puede registrase como administrador");
                window.location = "../administrador/registro.html";
            </script>';
    exit();
}
$verificar_correo = mysqli_query($conexion, "SELECT * FROM administrador WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
            <script>
                alert("ERROR : El CORREO ingresado ya esta asociado a una cuenta");
                window.location = "../administrador/registro.html";
            </script>';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
            <script>
                alert("registro exitoso");
                window.location = "login.php";
            </script>';
} else {
    echo '
            <script>
                alert("ERROR");
                window.location = "../registro.html";
            </script>';
}

?>