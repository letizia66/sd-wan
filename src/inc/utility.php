<?php

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function redirect($url, $statusCode = 302)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

function isAuthenticated($name, $password) {
  if ($name == "admin") {
      return true; // TODO db access
  } else {
    return false;
  }
}
function get_user_id($name) {
  return 3; // TODO db access
}

// Controllo se la sessione è presente
function check_session($print = false) {
  $sessiontimeout = 3600; // 1 ora
  session_start();

  if (!isset($_SESSION['logged_in'])) {
      $_SESSION['logged_in'] = false;
  } else {
    // Controllo se è scaduta la sessione di 1h
    if ((isset($_SESSION['LAST_ACTIVITY']) && ((time() - $_SESSION['LAST_ACTIVITY']) > $sessiontimeout))) {
      session_destroy();
      session_unset();
      $_SESSION['logged_in'] = false;
    } else {
      $_SESSION['LAST_ACTIVITY'] = time();
    }
  }
  if ($print) {
    var_dump($_SESSION);
    echo "time = " . time();
  }
  return $_SESSION['logged_in'];
}

// API Response
function sendResponse($resp_code, $message, $data){
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode(array('code'=>$resp_code,'message'=>$message,'data'=>$data));
}

function get_users() { // TODO db
  $json = file_get_contents('db/users.json', false);
  $data = json_decode($json);
  return $data;
}
?>
