const formulario = document.getElementById("form-admin");
const inputs = document.querySelectorAll("#form-admin input");
formulario.addEventListener("submit", (e) => {
  e.preventDefault();
  $("#form-admin").ajaxSubmit({
    url: "/PHP/login.php",
    type: "post",

    success: function (res) {
      if (res == "1") {
        formulario.submit();
      }
      if (res != "1") {
        Swal.fire({
          title: "Datos incorrectos",
          text: "Usuario o contraseña no validos.",
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
});
