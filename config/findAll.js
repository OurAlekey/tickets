setInterval(() => {
  chatBox = document.getElementById("cuerpo");

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.responseText;

      chatBox.innerHTML = data;
    }
  };

  xhr.open("POST", "./../config/findTicketsAll.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();
}, 1000);
