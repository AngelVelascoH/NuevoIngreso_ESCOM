<?php

include("conexion.php");
include("asignar.php");

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
    
$sql =  "INSERT INTO registros_principal VALUES ('$boleta','$nombres','$aPaterno','$aMaterno','$nacimiento','$genero','$curp','$dire','$colonia','$alcaldia','$cp',$tel,'$correo','$estado','$escuela',$promedio,'$opcion',0,'20:18:21')";

$sql3= "SELECT Boleta FROM registros_principal";
if (mysqli_query($con, $sql)): 
    {
        $cantidad = mysqli_query($con,$sql3);
        $numero = mysqli_num_rows($cantidad);
        $txt = asignar($numero);
        $lab = $txt["lab"];
        $horario = $txt["hora"];
        $sql2 = "UPDATE registros_principal SET LAB = $lab, Horario='$horario' WHERE Boleta ='$boleta'";
        mysqli_query($con,$sql2);
        echo "Laboratorio : " .$txt["lab"]." Horario : ".$txt["hora"];
        //generamos el pdf del alumno
        
        
    } 
else: 
    {
        echo "3";
       // echo "Error: " . $sql . "" . mysqli_error($con);
    }
endif;

?>