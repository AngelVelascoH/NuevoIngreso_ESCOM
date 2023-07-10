const formulario = document.getElementById("formulario-recuperacion");
const inputs = document.querySelectorAll("#formulario-recuperacion input");
const expresiones = {
  boleta: /^((P[PE])|\d{2})(\d{8})$/gm,
  curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
};
const campos = {
  boleta: false,
  curp: false,
};

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
  }
};
document.addEventListener(
  "invalid",
  (function () {
    return function (e) {
      //prevent the browser from showing default error bubble / hint
      e.preventDefault();
      // optionally fire off some custom validation handler
      // myValidation();
    };
  })(),
  true
);
document.addEventListener(
  "invalid",
  (function () {
    return function (e) {
      e.preventDefault();
    };
  })(),
  true
);

function camposvacios() {
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
    camposvacios();
  };
});

formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  if (campos.boleta && campos.curp) {
    $("#formulario-recuperacion").ajaxSubmit({
      url: "/PHP/recuperar.php",
      type: "post",

      success: function (res) {
        if (res == "1") {
          Swal.fire({
            title: "Se encontró un registro con esa boleta.",
            showDenyButton: true,
            confirmButtonText: "Descargar PDF",
            denyButtonText: `Salir`,
            icon: "success",
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              document.getElementById("formulario-recuperacion").submit();
              setTimeout(() => {
                window.open("../index.html", "_self");
              }, 5000);
            } else if (result.isDenied) {
              Swal.fire("PDF no descargado", "", "info");
            }
          });
        } else {
          Swal.fire({
            title: "ERROR",
            text: "No se encontro ningún registro con esos datos.",
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
  } else {
    Swal.fire({
      title: "Error",
      text: "Asegurate de llenar todos los campos correctamente",
      icon: "error",
    });
  }
});
