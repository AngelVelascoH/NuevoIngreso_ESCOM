<?php
/* Sesiones en PHP */
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/CSS/admin.css" />
    <div class="container-fluid text-center head">
        <br /><br />
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <span class="head-text">Bienvenido <?php echo $varsesion ?></span></div>
            
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM registros_principal";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_all($res);
    ?>
    <br><h1></h1>
    <div class="container-fluid text-center mt-3 ">
        <h1>Registros</h1>
        <br /><br />
        <div class="row">
            
            <div class="col-md-12 caja-login">
                <div class="table-responsive">
<table class="table table-hover table-dark table-sm ">
  <thead>
    <tr>
      <th scope="col">Boleta</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nacimiento</th>
      <th scope="col">Genero</th>
      <th scope="col">CURP</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Correo</th>
      <th scope="col">Estado</th>
      <th scope="col">Escuela</th>
      <th scope="col">Promedio</th>
      
      <th colspan='2'>Opciones</th>
    </tr>
  </thead>
  <tbody class="table-light">
      <?php
      foreach($row as $fila){
      ?>
      <tr>
      <th scope="row"><?php echo $fila[0] ?></th>
      <th><?php echo $fila[1]." ".$fila[2]." ".$fila[3] ?></th>
      <th><?php echo $fila[4] ?></th>
      <th><?php echo $fila[5] ?></th>
      <th><?php echo $fila[6] ?></th>
      <th><?php echo $fila[7]." | ".$fila[8]." | ".$fila[9] ?></th>
      <th><?php echo $fila[11] ?></th>
      <th><?php echo $fila[12] ?></th>
      <th><?php echo $fila[13] ?></th>
      <th><?php echo $fila[14] ?></th>
      <th><?php echo $fila[15] ?></th>
      
      <th><a href="editar.php?i=<?php echo $fila[0]?>"><img src="/Images/edit.png" alt="" class="icons"></a></th>
      <th><a href="eliminar.php?i=<?php echo $fila[0]?>"><img src="/Images/delete.png" alt="" class="icons"></a></th>
    </tr>
      <?php
      }
      ?>
    
  </tbody>
</table>
</div>
<br><br>


            
            
        </div>
      
    </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            
            <div class="col-md-12">
                <iframe src="/HTML/prueba.html" height="1500" width="100%"></iframe>
            </div>
            

        </div>
    </div>
    
    <footer class="container-fluid bg-dark fixed-bottom">
        <div class="row ">
            <div class="col-md text-light text-center py-3"><a href="cerrar.php">Cerrar sesion</a></div>
        </div>
    </footer>
    
    
</body>

</html>