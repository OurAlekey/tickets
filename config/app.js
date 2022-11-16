$(window).ready(function () {
  $("#login").on("submit", function (e) {
    e.preventDefault();
    let user = $("#user").val();
    let pass = $("#clave").val();
    $.post(
      "config/controlador.php",
      {
        user: user,
        pass: pass,
      },
      function (data) {
        console.log(data);
        if (data == "true") {
          location.href = `pages/home.php?usuario=${user}&agente=N&asignado=N`;
        } else if (data == "true1") {
          location.href = `pages/home.php?usuario=${user}&agente=S&asignado=N`;
        } else {
          swal.fire({
            title: "¡Error!",
            icon: "error",
            text: "Usuario/Contraseña incorrectas",
            timer: 5000,
            customClass: {
              popup: "container rounded",
            },
            confirmButtonColor: "#3EC3C8",
          });
        }
      }
    );
  });
});
