document.getElementById("clock_container").addEventListener("load", showTime());
document.getElementById("alarm_table").addEventListener("load", checkAlarm());

document.getElementById("add").addEventListener("click", () => {
  var tr = document.createElement("tr");
  var td_1 = document.createElement("td");
  var td_2 = document.createElement("td");

  td_1.appendChild(addP(document.getElementById("time").value, "set_alarm"));
  td_2.appendChild(
    addButton(
      "button_remove",
      "" + document.getElementById("alarms").childElementCount,
      "remove"
    )
  );
  tr.appendChild(td_1);
  tr.appendChild(td_2);
  document.getElementById("alarms").appendChild(tr);

  console.log();
});

function addButton(class_name, type, value) {
  var button = document.createElement("button");
  button.setAttribute("class", class_name);
  button.setAttribute("onclick", "remove(" + type + ")");
  button.innerHTML = value;
  return button;
}

function addP(text, class_name, position) {
  var p = document.createElement("p");
  p.setAttribute("class", class_name);
  if (text == "") {
    p.innerHTML = "00:00";
  } else {
    p.innerHTML = text;
  }
  return p;
}

function checkAlarm() {
  var alarms = document.getElementsByClassName("set_alarm");
  var date = new Date();
  for (var i = 0; i < alarms.length; i++) {
    var time = alarms[i].innerHTML.split(":");
    if (
      parseInt(time[0]) == date.getHours() &&
      parseInt(time[1]) == date.getMinutes()
    ) {
      alert("ALARM");
      remove(i);
    }
  }
  setTimeout(checkAlarm, 1000);
}

function remove(position) {
  var parent = document.getElementById("alarms");
  var child = parent.childNodes;
  parent.removeChild(child[position]);
  refactor();
}

function refactor() {
  var button = document.querySelectorAll(".button_remove");
  console.log(button);
  for (var i = 0; i < button.length; i++) {
    button[i].setAttribute("onclick", "remove(" + i + ")");
  }
}

function showTime() {
  var date = new Date();
  var hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
  var minute =
    date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
  var seconds =
    date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();

  document.getElementById("clock_container").textContent =
    hour + " : " + minute + " : " + seconds;
  setTimeout(showTime, 1000);
}

checkAlarm();
showTime();
