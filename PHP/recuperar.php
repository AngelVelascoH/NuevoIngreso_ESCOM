<?php
include("conexion.php");
include("asignar.php");
$con = conectar();
$boleta = $_POST['boleta'];
$curp = $_POST['curp'];
$sql =  "SELECT * FROM registros_principal WHERE Boleta = '$boleta' AND curp = '$curp' ";
$cantidad = mysqli_query($con,$sql);
$numero = mysqli_num_rows($cantidad);
if ($numero == 1) :{
    echo "1";
}
else :{
    echo "2";
}
endif;



?>