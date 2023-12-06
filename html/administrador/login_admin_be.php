<?php
    session_start();
    include("C:/xampp/htdocs/xampp/eDemocracia_src/php/conexion_be.php");
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['passwordd'];



    $validar_login_admin = mysqli_query($conexion, "SELECT * FROM administrador WHERE identificacion = '$identificacion' and pasword = '$contrasena'");

    if(mysqli_num_rows($validar_login_admin)> 0){
        $_SESSION['usuario'] = $identificacion;
        header("location: ../administrador/index.php");
        exit();
    }else {
        echo '
            <script>
                alert("ERROR : usuario no existe, verifique los datos ");
                window.location = "../administrador/login.php";
            </script>';
            exit();

    }



?>
