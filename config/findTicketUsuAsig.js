setInterval(() => {
  user = document.getElementById("user").value;
  table = document.getElementById("cuerpo");

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.responseText;

      table.innerHTML = data;
    }
  };

  xhr.open("POST", "./../config/findTicketUsuAsig.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(`user=${user}`);
}, 1000);
