function edit(id) {
  document.getElementById("item_id").setAttribute("value", id);
  var tr = document.getElementById("user_table").childNodes[id];
  document
    .getElementById("name_modal")
    .setAttribute("value", tr.childNodes[0].childNodes[0].innerHTML);
  document
    .getElementById("surname_modal")
    .setAttribute("value", tr.childNodes[1].childNodes[0].innerHTML);
  document
    .getElementById("ID_modal")
    .setAttribute("value", tr.childNodes[2].childNodes[0].innerHTML);
}

document.getElementById("btn_save").addEventListener("click", () => {
  edit_element(document.getElementById("item_id").value);
});

document.getElementById("btn_delete").addEventListener("click", () => {
  remove(document.getElementById("item_id").value);
});

function edit_element(position) {
  var tr = document.getElementById("user_table").childNodes[position];
  tr.childNodes[0].childNodes[0].innerHTML = document.getElementById(
    "name_modal"
  ).value;
  tr.childNodes[1].childNodes[0].innerHTML = document.getElementById(
    "surname_modal"
  ).value;
  tr.childNodes[2].childNodes[0].innerHTML = document.getElementById(
    "ID_modal"
  ).value;
}

function remove(position) {
  var parent = document.getElementById("user_table");
  var child = parent.childNodes;
  parent.removeChild(child[position]);
  refactor();
}

function refactor() {
  var button = document.querySelectorAll(".edit_btn");
  console.log(button);
  for (var i = 0; i < button.length; i++) {
    button[i].setAttribute("onclick", "edit(" + i + ")");
  }
}
