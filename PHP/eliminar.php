 <?php
 session_start();
    include("conexion.php");
    $con = conectar();
    if (isset($_SESSION["usuario"])) {
    $varsesion = $_SESSION["usuario"];
    }
    else{
        $varsesion = "";
    }
    
    if ($varsesion == null || $varsesion == "") {
        echo "Sin autorización para entrar a esta página.";
        die();
    }
$boleta = $_GET['i'];

$con = conectar();
$sql = "DELETE FROM registros_principal WHERE Boleta='$boleta'";
mysqli_query($con,$sql);
header("Location: CRUD.PHP")
?>