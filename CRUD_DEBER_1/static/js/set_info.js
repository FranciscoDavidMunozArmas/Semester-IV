function set_modal(data_id, data_name, data_surname, data_user_id) {
  document.getElementById("hidden_id").setAttribute("value", data_id);
  document.getElementById("name_update").setAttribute("value", data_name);
  document.getElementById("surname_update").setAttribute("value", data_surname);
  document.getElementById("user_id_update").setAttribute("value", data_user_id);
}
