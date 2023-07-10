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
$sql = "SELECT * FROM registros_principal WHERE Boleta='$boleta'";
$res = mysqli_query($con,$sql);
$alumno = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <!-- Bootstrap CSS v5.0.2 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/CSS/Styles1.css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col12 caja-formulario container mt-5">
          <br />
          <h1 style="text-align: center">Registro</h1>
          <br />

          <form action="" id="formulario-principal" method="post">
            <fieldset>
              <legend>Identidad</legend>

              <div class="row g-3">
                <div class="col-md-6">
                  <label for="boleta" class="form-label">Boleta</label>
                  <input
                    type="text"
                    class="form-control"
                    maxlength="10"
                    id="boleta"
                    name="boleta"
                    readonly
                    placeholder="Ingrese su boleta, con formato PP, PE o numérico"
                    value="<?php echo $alumno[0];?>"
                    required
                  />

                  <label id="error-boleta" class="form-label errores"
                    >Formato de boleta no valido, la boleta puede iniciar con PP
                    o PE seguido de 8 dígitos o solo 10 dígitos.</label
                  >
                </div>
                <div class="col-md-6">
                  <label for="nombres" class="form-label">Nombre(s)</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombres"
                    name="nombres"
                    placeholder="Ingrese sus nombres"
                    value="<?php echo $alumno[1];?>"
                    required
                  />
                  <label id="error-nombres" class="form-label errores"
                    >Asegurese de no introducir números ni carácteres
                    especiales</label
                  >
                </div>
                <div class="col-md-3">
                  <label for="aPaterno" class="form-label"
                    >Apellido Paterno</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="aPaterno"
                    name="apaterno"
                    placeholder="Ingrese su apellido paterno"
                    value="<?php echo $alumno[2];?>"
                    required
                  />
                  <label id="error-apaterno" class="form-label errores"
                    >Asegurese de no introducir números ni carácteres
                    especiales</label
                  >
                </div>
                <div class="col-md-3">
                  <label for="aMaterno" class="form-label"
                    >Apellido Materno</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="aMaterno"
                    name="amaterno"
                    placeholder="Ingrese su apellido materno"
                    value="<?php echo $alumno[3];?>"
                    required
                  />
                  <label id="error-amaterno" class="form-label errores"
                    >Asegurese de no introducir números ni carácteres
                    especiales</label
                  >
                </div>
                <div class="col-md-3">
                  <label for="nacimiento" class="form-label"
                    >Fecha de nacimiento</label
                  >
                  <input
                    type="date"
                    min="1980-01-01"
                    max="2005-12-31"
                    value="<?php echo $alumno[4];?>"
                    class="form-control"
                    id="nacimiento"
                    name="nacimiento"
                    placeholder="Seleccione su fecha de nacimiento"
                    
                    required
                  />
                </div>
                <div class="col-md-3">
                  <label for="genero" class="form-label">Género</label>
                  <select
                    class="form-select"
                    required
                    id="genero"
                    name="genero"
                    
                    onchange="selects(event)"
                  >
                  <option ><?php echo $alumno[5];?></option>
                    <option value="1">Seleccione su género</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>No Binario</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="curp" class="form-label">CURP</label>
                  <input
                    type="text"
                    class="form-control"
                    id="curp"
                    name="curp"
                    placeholder="Ingrese su CURP"
                    value="<?php echo $alumno[6];?>"
                    required
                  />
                  <label id="error-curp" class="form-label errores"
                    >Asegurese de seguir el formato establecido del CURP en
                    México.</label
                  >
                </div>
              </div>
            </fieldset>

            <br />
            <hr />
            <br />
            <fieldset>
              <legend>Contacto</legend>
              <div class="row g-3">
                <div class="col-md-8">
                  <label for="dire" class="form-label">Dirección</label>
                  <input
                    type="text"
                    class="form-control"
                    id="dire"
                    name="dire"
                    placeholder="Ingrese su dirección completa"
                    value="<?php echo $alumno[7];?>"
                    required
                  />
                  <label id="error-dire" class="form-label errores"
                    >No puede dejar el campo vacío.</label
                  >
                </div>
                <div class="col-md-4">
                  <label for="colonia" class="form-label">Colonia</label>
                  <input
                    type="text"
                    class="form-control"
                    id="colonia"
                    name="colonia"
                    placeholder="Ingrese su colonia"
                    value="<?php echo $alumno[8];?>"
                    required
                  />
                  <label id="error-colonia" class="form-label errores"
                    >No puede dejar el campo vacío.</label
                  >
                </div>
                <div class="col-md-3">
                  <label for="alcaldia" class="form-label">Alcaldía</label>
                  <select
                    id="Alcaldia"
                    name="Alcaldia"
                    class="form-select"
                    
                    required
                    onchange="selects(event)"
                  >
                  <option ><?php echo $alumno[9];?></option>
                    <option value="1">Seleccione su alcaldía</option>
                    <option value="Azcapotzalco">Azcapotzalco</option>
                    <option value="Álvaro Obregón">Álvaro Obregón</option>
                    <option value="Benito Juárez">Benito Juárez</option>
                    <option value="Coyoacán">Coyoacán</option>
                    <option value="Cuajimalpa de Morelos">
                      Cuajimalpa de Morelos
                    </option>
                    <option value="Cuauhtémoc">Cuauhtémoc</option>
                    <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                    <option value="Iztacalco">Iztacalco</option>
                    <option value="Iztapalapa">Iztapalapa</option>
                    <option value="Magdalena Contreras">
                      Magdalena Contreras
                    </option>
                    <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                    <option value="Milpa Alta">Milpa Alta</option>
                    <option value="Tlalpan">Tlalpan</option>
                    <option value="Tláhuac">Tláhuac</option>
                    <option value="Venustiano Carranza">
                      Venustiano Carranza
                    </option>
                    <option value="Xochimilco">Xochimilco</option>
                    <option value="Foráneo">Fuera de la CDMX</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="postal" class="form-label">Código Postal</label>
                  <input
                    type="text"
                    class="form-control"
                    maxlength="5"
                    id="postal"
                    name="postal"
                    placeholder="Ingrese su Código"
                    value="<?php echo $alumno[10];?>"
                    required
                  />
                  <label id="error-postal" class="form-label errores"
                    >Introduzca un C.P. válido en México (5 dígitos).</label
                  >
                </div>
                <div class="col-md-2">
                  <label for="telefono" class="form-label"
                    >Número de teléfono</label
                  >
                  <input
                    type="tel"
                    maxlength="10"
                    class="form-control"
                    id="telefono"
                    name="telefono"
                    placeholder="Ingrese su teléfono"
                    value="<?php echo $alumno[11];?>"
                    required
                  />
                  <label id="error-telefono" class="form-label errores"
                    >Introduzca un número válido, prefijos 55 y 56 válidos. (10
                    dígitos).</label
                  >
                </div>
                <div class="col-md-5">
                  <label for="correo" class="form-label"
                    >Dirección de correo electrónico
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    id="correo"
                    name="correo"
                    placeholder="Ingrese su correo electrónico"
                    value="<?php echo $alumno[12];?>"
                    required
                  />
                  <label id="error-correo" class="form-label errores"
                    >Introduzca una dirección de correo válida
                    alguien@example.com</label
                  >
                </div>
              </div>
            </fieldset>

            <br />
            <hr />
            <br />
            <fieldset>
              <legend>Procedencia</legend>
              <div class="row g-3">
                <div class="col-md-3">
                  <label for="escuela" class="form-label"
                    >Escuela de Procedencia</label
                  >
                  <select
                    id="escuela"
                    name="escuela"
                    class="form-select"
                    
                    onchange="selects(event)"
                  >
                    <option ><?php echo $alumno[14];?></option>
                    <option value="1">Seleccione su escuela</option>
                    <option>CECyT #1</option>
                    <option>CECyT #2</option>
                    <option>CECyT #3</option>
                    <option>CECyT #4</option>
                    <option>CECyT #5</option>
                    <option>CECyT #6</option>
                    <option>CECyT #7</option>
                    <option>CECyT #8</option>
                    <option>CECyT #9</option>
                    <option>CECyT #10</option>
                    <option>CECyT #11</option>
                    <option>CECyT #12</option>
                    <option>CECyT #13</option>
                    <option>CECyT #14</option>
                    <option>CECyT #15</option>
                    <option>CECyT #16</option>
                    <option>CECyT #17</option>
                    <option>CECyT #18</option>
                    <option>CECyT #19</option>
                    <option>CET</option>
                    <option>Otra</option>
                  </select>
                </div>

                <div class="col-md-3">
                  <label for="entidad" class="form-label"
                    >Entidad Federativa de Procedencia</label
                  >
                  <select
                    name="Estado"
                    class="form-select"
                    
                    onchange="selects(event)"
                  >
                    <option ><?php echo $alumno[13];?></option>
                    <option value="1">Seleccione su Estado</option>
                    <option>Aguascalientes</option>
                    <option>Baja California</option>
                    <option>Baja California Sur</option>
                    <option>Campeche</option>
                    <option>Coahuila de Zaragoza</option>
                    <option>Colima</option>
                    <option>Chiapas</option>
                    <option>Chihuahua</option>
                    <option>Ciudad de México</option>
                    <option>Durango</option>
                    <option>Guanajuato</option>
                    <option>Guerrero</option>
                    <option>Hidalgo</option>
                    <option>Jalisco</option>
                    <option>México</option>
                    <option>Michoacán de Ocampo</option>
                    <option>Morelos</option>
                    <option>Nayarit</option>
                    <option>Nuevo León</option>
                    <option>Oaxaca</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                    <option>Quintana Roo</option>
                    <option>San Luis Potosí</option>
                    <option>Sinaloa</option>
                    <option>Sonora</option>
                    <option>Tabasco</option>
                    <option>Tamaulipas</option>
                    <option>Tlaxcala</option>
                    <option>Veracruz</option>
                    <option>Yucatán</option>
                    <option>Zacatecas</option>
                    <option>Veracruz</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="escuela-dif" class="form-label"
                    >Nombre de la escuela</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="escuela-dif"
                    name="escuela-dif"
                    disabled
                    placeholder="Ingrese el nombre de la Escuela (Solo si seleccionó otra)"
                    
                    required
                  />
                  <label id="error-escuela-dif" class="form-label errores"
                    >No puede dejar este campo vacío si seleccionó otra</label
                  >
                </div>
                <div class="col-md-2">
                  <label for="promedio" class="form-label">Promedio</label>
                  <input
                    type="text"
                    maxlength="4"
                    class="form-control"
                    id="promedio"
                    name="promedio"
                    placeholder="Ingrese su promedio"
                    value="<?php echo $alumno[15];?>"
                    required
                  />
                  <label id="error-promedio" class="form-label errores"
                    >Asegurese de introducir su promedio con dos decimales (o
                    solo 10).</label
                  >
                </div>
                <div class="col-md-5">
                  <label for="opcion" class="form-label">Escom fue tu: </label>
                  <select
                    class="form-select"
                    required
                    id="opcion"
                    name="opcion"
                    
                    onchange="selects(event)"
                  >
                  <option ><?php echo $alumno[16];?></option>
                    <option value="1">Seleccione su opción</option>
                    <option>Primera</option>
                    <option>Segunda</option>
                    <option>Tercera</option>
                    <option>Cuarta</option>
                  </select>
                </div>
                <br />
                <hr />
                <br />
                <div class="text-center">
                  <br />
                  <button
                    type="submit"
                    class="btn-lg enviar btn-primary"
                    id="enviar-datos"
                  >
                    Actualizar
                  </button>
                </div>
              </div>
            </fieldset>
          </form>

          <br /><br />
        </div>

        <div class="col-lg-2"></div>
      </div>
    </div>

    <br /><br />
  </body>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/JS/editar.js"></script>
</html>
