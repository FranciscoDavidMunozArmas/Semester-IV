document.getElementById("btn_check_id").addEventListener("click", () => {
  if (IDVerificator(document.getElementById("ID").value)) {
    document
      .getElementById("ID")
      .setAttribute("style", "border-color: green;border-radius: 5px;");
    document.getElementById("check_label").innerHTML = "Correct";
    document
      .getElementById("check_label")
      .setAttribute("style", "color: green;");
  } else {
    document
      .getElementById("ID")
      .setAttribute("style", "border-color: red;border-radius: 5px;");
    document.getElementById("check_label").innerHTML = "Error, incorrect ID";
    document.getElementById("check_label").setAttribute("style", "color: red;");
  }
});

function IDVerificator(ID) {
  if (ID.length != 10) {
    return false;
  }

  if (
    parseInt(ID.charAt(0) + ID.charAt(1)) > 24 ||
    parseInt(ID.charAt(0) + ID.charAt(1)) < 1
  ) {
    return false;
  }

  if (parseInt(ID.charAt(2)) > 5) {
    return false;
  }

  if (!verifyDigit(ID)) {
    return false;
  }

  return true;
}

function verifyDigit(ID) {
  var sum = 0;
  for (var i = 0; i < ID.length - 1; i++) {
    if (i % 2 == 0) {
      var product = parseInt(ID.charAt(i)) * 2;
      if (product >= 10) {
        product -= 9;
      }
      sum += product;
    } else {
      sum += parseInt(ID.charAt(i)) * 1;
    }
  }
  return nextTen(sum) - sum == parseInt(ID.charAt(ID.length - 1));
}

function nextTen(number) {
  while (number % 10 != 0) {
    number++;
  }
  return number;
}

function set_on_table() {
  var tr = document.createElement("tr");
  var td_user = document.createElement("td");
  var td_pwd = document.createElement("td");
  var td_id = document.createElement("td");
  var td_btn = document.createElement("td");

  td_user.appendChild(addP(document.getElementById("name").value, "td_name"));
  td_pwd.appendChild(addP(document.getElementById("surname").value, "td_name"));
  td_id.appendChild(addP(document.getElementById("ID").value, "td_name"));

  td_btn.appendChild(
    addButton(
      "edit_btn",
      "" + document.getElementById("user_table").childElementCount,
      "Edit"
    )
  );

  tr.appendChild(td_user);
  tr.appendChild(td_pwd);
  tr.appendChild(td_id);
  tr.appendChild(td_btn);
  document.getElementById("user_table").appendChild(tr);
}

function addButton(class_name, type, value) {
  var button = document.createElement("button");
  button.setAttribute("class", class_name);
  button.setAttribute("onclick", "edit(" + type + ")");
  button.setAttribute("data-toggle", "modal");
  button.setAttribute("data-target", "#edit_modal");
  button.innerHTML = value;
  return button;
}

function addP(text, class_name) {
  var p = document.createElement("p");
  p.setAttribute("class", class_name);
  if (text == "") {
    p.innerHTML = "NULL";
  } else {
    p.innerHTML = text;
  }
  return p;
}
