<?php
require "inc/utility.php";
  if (!check_session()) {
    sendResponse(500,"Session expires!", null);
  } else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      sendResponse(200, "User List", get_users());
    }
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
      sendResponse(200,"User deleted!", null);
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      sendResponse(200,"User created!", '{"Id": "3","Name": "verdi","E-mail": "verdi@azienda.it","Device Id": "ciao lippa"}');
    }
  }
?>
