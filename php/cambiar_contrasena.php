<?php 
require_once('conexion_be.php');
$identificacion = $_POST['identificacion'];
$pass = $_POST['new_password'];

$query = "UPDATE `administrador` SET `pasword`='$pass' WHERE identificacion= $identificacion";
$conexion->query($query);

header("Location: ../html/administrador/login.php");


?>