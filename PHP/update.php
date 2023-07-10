<?php

include("conexion.php");


$con = conectar();


$boleta = $_POST['boleta'];
$nombres = ($_POST['nombres']);
$aPaterno = $_POST['apaterno'];
$aMaterno = ($_POST['amaterno']);
$nacimiento = ($_POST['nacimiento'])?? null;
$genero = ($_POST['genero']);
$curp = $_POST['curp'];
$dire = ($_POST['dire']);
$colonia = $_POST['colonia'];
$alcaldia = ($_POST['Alcaldia']);
$cp = $_POST['postal'];
$tel = ($_POST['telefono']);
$correo = $_POST['correo'];
$estado = ($_POST['Estado']);
 if ($_POST['escuela'] == "Otra"): {
    $escuela = ($_POST['escuela-dif'])?? null;}
 else: {
    $escuela = ($_POST['escuela']);}
 endif;

$promedio = (floatval($_POST['promedio']));
$opcion = ($_POST['opcion']);
    
$sql =  "UPDATE registros_principal SET nombres = '$nombres', apaterno = '$aPaterno', amaterno = '$aMaterno', nacimiento = '$nacimiento', genero = '$genero', curp = '$curp', dire = '$dire', colonia = '$colonia',alcaldia = '$alcaldia', cp = '$cp',tel =$tel , correo = '$correo',estado = '$estado', escuela = '$escuela', promedio = $promedio,opcion = '$opcion' WHERE Boleta = '$boleta'";

if (mysqli_query($con, $sql)): 
    {
        
        echo "1";
        
        
        
    } 
else: 
    {
        echo "error";
       
    }
endif;

?>