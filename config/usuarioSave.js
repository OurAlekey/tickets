$(window).ready(function () {
  $("#login").on("submit", function (e) {
    e.preventDefault();
    usuer;
    let userIn = $("#usuer").val();
    let user = $("#usuario").val();
    let agente = $("#agente").val();
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let correo = $("#correo").val();
    let clave = $("#clave").val();
    let rol = $("#usuAsig").val();
    console.log(user, nombre, apellido, correo, clave, rol);
    $.post(
      "../config/usuarioSave.php",
      {
        user: user,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        clave: clave,
        rol: rol,
      },
      function (data) {
        console.log(data);
        if (data == "true" && agente == "N") {
          location.href = `/tickets/index.html`;
        } else if (data == "true" && agente == "S") {
          location.href = `usuarios.php?usuario=${userIn}&agente=${agente}&asignado=N`;
        } else {
          swal
            .fire({
              title: "¡Error!",
              icon: "error",
              text: "Usuario ya existe",
              timer: 2000,
              customClass: {
                popup: "container rounded",
              },
              confirmButtonColor: "#3EC3C8",
            })
            .then(() => {
              location.reload();
            });
          setInterval("location.reload()", 3000);
        }
      }
    );
  });
});
