function highlightRow(row) {
  var table = document.getElementById("usersTable");
  var rows = table.getElementsByTagName("tr");

  for (var i = 0; i < rows.length; i++) {
    rows[i].classList.remove("selected");
  }

  row.classList.add("selected");
}

function updateAction(action) {
  var selectedRow = document.querySelector("#usersTable tbody tr.selected");
  if (selectedRow) {
    var cells = selectedRow.getElementsByTagName("td");
    var email = cells[2].innerText;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../includes/update_action.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        console.log(xhr.responseText);
        // Refresh table data immediately after updating action
        window.location.reload(true);
      }
    };
    xhr.send("email=" + email + "&action=" + action);
  } else {
    alert("Please select a row first.");
  }
}
