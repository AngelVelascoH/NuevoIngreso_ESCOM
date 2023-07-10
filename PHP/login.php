<?php
session_start();
include("conexion.php");
$con = conectar();
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$sql = "SELECT *  FROM admin WHERE   usuario = '$usuario' and  BINARY pass = '$pass'";
$cantidad = mysqli_query($con,$sql);
$numero = mysqli_num_rows($cantidad);
if ($numero == 1): {
    $_SESSION["usuario"]="Administrador";
    echo "1";
}
else:{
    echo "2";
}
endif;


?>