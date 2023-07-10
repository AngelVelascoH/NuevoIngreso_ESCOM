const formulario = document.getElementById("formulario-principal");
const inputs = document.querySelectorAll("#formulario-principal input");

const expresiones = {
  boleta: /^((P[PE])|\d{2})(\d{8})$/gm,
  nombre: /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i,
  curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
  direccion: /[A-Za-z0-9'\.\-\s\,]/gm,
  codigo: /(\d{5})/gm,
  telefono: /5(6|5)\d{8}/gm,
  correo: /\S+@\S+\.\S+/gm,
  // /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
  promedio: /(^10$)|^\d\.\d{2}$/i,
};

const campos = {
  boleta: false,
  nombres: false,
  apaterno: false,
  amaterno: false,
  curp: false,
  dire: false,
  colonia: false,
  postal: false,
  tel: false,
  correo: false,
  escuela_dif: true,
  promedio: false,
  genero: false,
  alcaldia: false,
  escuela: false,
  estado: false,
  opcion: false,
};
const valores = {
  genero: "",
  alcaldia: "",
  escuela: "",
  estado: "",
  opcion: "",
};
function selects(event) {
  switch (event.target.name) {
    case "genero":
      if (event.target.value != "1") {
        valores["genero"] = event.target.value;
        campos["genero"] = true;
      } else {
        campos["genero"] = false;
      }
      break;
    case "Alcaldia":
      if (event.target.value != "1") {
        valores["alcaldia"] = event.target.value;
        campos["alcaldia"] = true;
      } else {
        campos["alcaldia"] = false;
      }
      break;

    case "escuela":
      if (event.target.value != "Otra") {
        valores["escuela"] = event.target.value;
        campos["escuela"] = true;
      } else {
        campos["escuela"] = false;
        valores["escuela"] = "Otra";
      }
      break;
    case "Estado":
      if (event.target.value != "1") {
        valores["estado"] = event.target.value;
        campos["estado"] = true;
      } else {
        campos["estado"] = false;
      }

      break;
    case "opcion":
      if (event.target.value != "1") {
        valores["opcion"] = event.target.value;
        campos["opcion"] = true;
      } else {
        campos["opcion"] = false;
      }
      break;
  }
}

var vals = [];

const validarformulario = (e) => {
  switch (e.target.name) {
    case "boleta":
      if (expresiones.boleta.test(e.target.value)) {
        document.getElementById("boleta").classList.remove("incorrecto");
        document.getElementById("boleta").classList.add("correcto");
        document
          .getElementById("error-boleta")
          .classList.remove("errores-mostrar");
        campos["boleta"] = true;
      } else {
        if (e.target.value.length == 10) {
          break;
        }
        document.getElementById("boleta").classList.remove("correcto");
        document.getElementById("boleta").classList.add("incorrecto");
        document
          .getElementById("error-boleta")
          .classList.add("errores-mostrar");
        campos["boleta"] = false;
      }
      break;
    case "nombres":
      if (expresiones.nombre.test(e.target.value)) {
        document.getElementById("nombres").classList.remove("incorrecto");
        document.getElementById("nombres").classList.add("correcto");
        document
          .getElementById("error-nombres")
          .classList.remove("errores-mostrar");
        campos["nombres"] = true;
      } else {
        document.getElementById("nombres").classList.remove("correcto");
        document.getElementById("nombres").classList.add("incorrecto");
        document
          .getElementById("error-nombres")
          .classList.add("errores-mostrar");
        campos["nombres"] = false;
      }
      break;
    case "apaterno":
      if (expresiones.nombre.test(e.target.value)) {
        document.getElementById("aPaterno").classList.remove("incorrecto");
        document.getElementById("aPaterno").classList.add("correcto");
        document
          .getElementById("error-apaterno")
          .classList.remove("errores-mostrar");
        campos["apaterno"] = true;
      } else {
        document.getElementById("aPaterno").classList.remove("correcto");
        document.getElementById("aPaterno").classList.add("incorrecto");
        document
          .getElementById("error-apaterno")
          .classList.add("errores-mostrar");
        campos["apaterno"] = false;
      }
      break;
    case "amaterno":
      if (expresiones.nombre.test(e.target.value)) {
        document.getElementById("aMaterno").classList.remove("incorrecto");
        document.getElementById("aMaterno").classList.add("correcto");
        document
          .getElementById("error-amaterno")
          .classList.remove("errores-mostrar");
        campos["amaterno"] = true;
      } else {
        document.getElementById("aMaterno").classList.remove("correcto");
        document.getElementById("aMaterno").classList.add("incorrecto");
        document
          .getElementById("error-amaterno")
          .classList.add("errores-mostrar");
        campos["amaterno"] = false;
      }
      break;
    case "curp":
      if (expresiones.curp.test(e.target.value)) {
        document.getElementById("curp").classList.remove("incorrecto");
        document.getElementById("curp").classList.add("correcto");
        document
          .getElementById("error-curp")
          .classList.remove("errores-mostrar");
        campos["curp"] = true;
      } else {
        document.getElementById("curp").classList.remove("correcto");
        document.getElementById("curp").classList.add("incorrecto");
        document.getElementById("error-curp").classList.add("errores-mostrar");
        campos["curp"] = false;
      }
      break;
    case "dire":
      if (e.target.value.length != "") {
        document.getElementById("dire").classList.remove("incorrecto");
        document.getElementById("dire").classList.add("correcto");
        document
          .getElementById("error-dire")
          .classList.remove("errores-mostrar");
        campos["dire"] = true;
      } else {
        document.getElementById("dire").classList.remove("correcto");
        document.getElementById("dire").classList.add("incorrecto");
        document.getElementById("error-dire").classList.add("errores-mostrar");
        campos["dire"] = false;
      }
      break;
    case "colonia":
      if (e.target.value.length != "") {
        document.getElementById("colonia").classList.remove("incorrecto");
        document.getElementById("colonia").classList.add("correcto");

        document
          .getElementById("error-colonia")
          .classList.remove("errores-mostrar");
        campos["colonia"] = true;
      } else {
        document.getElementById("colonia").classList.remove("correcto");
        document.getElementById("colonia").classList.add("incorrecto");
        document
          .getElementById("error-colonia")
          .classList.add("errores-mostrar");
        campos["colonia"] = false;
      }
      break;
    case "postal":
      if (expresiones.codigo.test(e.target.value)) {
        document.getElementById("postal").classList.remove("incorrecto");
        document.getElementById("postal").classList.add("correcto");
        document
          .getElementById("error-postal")
          .classList.remove("errores-mostrar");
        campos["postal"] = true;
      } else {
        if (e.target.value.length == 5) {
          break;
        }
        document.getElementById("postal").classList.remove("correcto");
        document.getElementById("postal").classList.add("incorrecto");
        document
          .getElementById("error-postal")
          .classList.add("errores-mostrar");
        campos["postal"] = false;
      }
      break;
    case "telefono":
      if (expresiones.telefono.test(e.target.value)) {
        document.getElementById("telefono").classList.remove("incorrecto");
        document.getElementById("telefono").classList.add("correcto");
        document
          .getElementById("error-telefono")
          .classList.remove("errores-mostrar");
        campos["tel"] = true;
      } else {
        if (e.target.value.length == 10) {
          break;
        }
        document.getElementById("telefono").classList.remove("correcto");
        document.getElementById("telefono").classList.add("incorrecto");
        document
          .getElementById("error-telefono")
          .classList.add("errores-mostrar");
        campos["tel"] = false;
      }
      break;
    case "correo":
      if (expresiones.correo.test(e.target.value)) {
        document.getElementById("correo").classList.remove("incorrecto");
        document.getElementById("correo").classList.add("correcto");
        document
          .getElementById("error-correo")
          .classList.remove("errores-mostrar");
        campos["correo"] = true;
      } else {
        document.getElementById("correo").classList.remove("correcto");
        document.getElementById("correo").classList.add("incorrecto");
        document
          .getElementById("error-correo")
          .classList.add("errores-mostrar");
        campos["correo"] = false;
      }
      break;
    case "escuela-dif":
      if (expresiones.direccion.test(e.target.value)) {
        document.getElementById("escuela-dif").classList.remove("incorrecto");
        document.getElementById("escuela-dif").classList.add("correcto");
        document
          .getElementById("error-escuela-dif")
          .classList.remove("errores-mostrar");
        campos["escuela_dif"] = true;
      } else {
        document.getElementById("escuela-dif").classList.remove("correcto");
        document.getElementById("escuela-dif").classList.add("incorrecto");
        document
          .getElementById("error-escuela-dif")
          .classList.add("errores-mostrar");
        campos["escuela_dif"] = false;
      }
      break;
    case "promedio":
      if (expresiones.promedio.test(e.target.value)) {
        document.getElementById("promedio").classList.remove("incorrecto");
        document.getElementById("promedio").classList.add("correcto");
        document
          .getElementById("error-promedio")
          .classList.remove("errores-mostrar");
        campos["promedio"] = true;
      } else {
        document.getElementById("promedio").classList.remove("correcto");
        document.getElementById("promedio").classList.add("incorrecto");
        document
          .getElementById("error-promedio")
          .classList.add("errores-mostrar");
        campos["promedio"] = false;
      }
      break;
  }
};

document.addEventListener(
  "invalid",
  (function () {
    return function (e) {
      e.preventDefault();
    };
  })(),
  true
);
function myFunction() {
  Swal.fire({
    title: "Error",
    text: "Todos los campos deben estar llenos",
    icon: "error",
    confirmButtonColor: "#006699",
    confirmButtonText: "OK",
  });
}

inputs.forEach((input) => {
  input.addEventListener("keyup", validarformulario);
  input.oninvalid = function () {
    myFunction();
  };
});
formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  if (
    campos.apaterno &&
    campos.amaterno &&
    campos.boleta &&
    campos.colonia &&
    campos.correo &&
    campos.curp &&
    campos.dire &&
    campos.escuela_dif &&
    campos.nombres &&
    campos.postal &&
    campos.promedio &&
    campos.tel &&
    campos.alcaldia &&
    campos.genero &&
    campos.opcion &&
    campos.estado &&
    valores["escuela"] != "1" &&
    valores["escuela"] != ""
  ) {
    inputs.forEach((input) => {
      vals.push(input.value);
    });
    if (campos.escuela) {
      vals[11] = valores["escuela"];
    }
    var text =
      "<div class='izq'>" +
      "<strong>Boleta:</strong>  " +
      vals[0] +
      "<br />" +
      "<strong>Nombre(s):</strong>  " +
      vals[1] +
      "<br />" +
      "<strong>Apellido Paterno:</strong>  " +
      vals[2] +
      "<br />" +
      "<strong>Apellido Materno:</strong>  " +
      vals[3] +
      "<br />" +
      "<strong>Fecha de nacimiento:</strong>  " +
      vals[4] +
      "<br />" +
      "<strong>Género:</strong>  " +
      valores["genero"] +
      "<br />" +
      "<strong>CURP:</strong>  " +
      vals[5] +
      "<br />" +
      "<strong>Dirección:</strong>  " +
      vals[6] +
      "<br />" +
      "<strong>Colonia:</strong>  " +
      vals[7] +
      "<br />" +
      "<strong>Alcaldía:</strong>  " +
      valores["alcaldia"] +
      "<br />" +
      "<strong>Código Postal:</strong>  " +
      vals[8] +
      "<br />" +
      "<strong>Número de teléfono:</strong>  " +
      vals[9] +
      "<br />" +
      "<strong>Correo:</strong>  " +
      vals[10] +
      "<br />" +
      "<strong>Escuela:</strong>  " +
      vals[11] +
      "<br />" +
      "<strong>Estado de procedencia:</strong>  " +
      valores["estado"] +
      "<br />" +
      "<strong>Promedio:</strong>  " +
      vals[12] +
      "<br />" +
      "<strong>ESCOM fue tu:</strong>  " +
      valores["opcion"] +
      " opción." +
      "<br />" +
      "</div>";

    Swal.fire({
      title: "Verifica tus datos.",
      html: text,
      showCancelButton: true,
      confirmButtonColor: "#006699;",

      confirmButtonText: "Aceptar",
      cancelButtonText: "Modificar",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $("#formulario-principal").ajaxSubmit({
          url: "/PHP/test1.php",
          type: "post",

          success: function (res) {
            if (res != "0") {
              $("#formulario-principal").ajaxSubmit({
                url: "/PHP/correo.php",
                type: "post",
              });
              Swal.fire({
                title:
                  "Registro completado con éxito, se ha enviado un correo con más información.",
                showDenyButton: true,
                confirmButtonText: "Descargar PDF",
                denyButtonText: `Salir`,
                icon: "success",
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  document.getElementById("formulario-principal").submit();
                  setTimeout(() => {
                    window.open("../index.html", "_self");
                  }, 5000);
                } else if (result.isDenied) {
                  Swal.fire("PDF no descargado.", "", "info");
                }
              });
            }
            if (res == "3") {
              Swal.fire({
                title: "ERROR",
                text: "Usuario ya registrado",
                icon: "error",
              });
            }
          },
          error: function () {
            Swal.fire({
              title: "Error",
              text: "Error interno, por favor, vuelva a intentarlo",
              icon: "error",
            });
          },
        });
      }
    });
    vals = [];
    text = "";
  } else {
    Swal.fire({
      title: "Error",
      text: "Asegurate de llenar todos los campos correctamente",
      icon: "error",
    });
  }
});

function habilitar() {
  select = document.getElementById("escuela").value;
  val = 0;
  if (select == "Otra") {
    val = 1;
  }
  if (val) {
    document.getElementById("escuela-dif").disabled = false;
  } else {
    document.getElementById("escuela-dif").disabled = true;
    document.getElementById("escuela-dif").value = "";
    document.getElementById("escuela-dif").classList.remove("correcto");
    document.getElementById("escuela-dif").classList.remove("incorrecto");
  }
}
document.getElementById("escuela").addEventListener("change", habilitar);

//parte AJAX envio de información a PHP sin refrescar página:
