setInterval(() => {
  chatBox = document.getElementById("pureba");
  idTicket = document.getElementById("tic_id").value;
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.responseText;
      var objDiv = document.getElementById("pureba");

      chatBox.innerHTML = data;

      objDiv.scrollTop = objDiv.scrollHeight;
    }
  };

  xhr.open("POST", "./../config/chatTicketGet.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(`numticket=${idTicket}`);
}, 1000);
