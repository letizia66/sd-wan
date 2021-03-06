<?php
require 'db.php';

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
function sendResponse($resp_code, $message, $data = null){
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json; charset=UTF-8');
  echo json_encode(array('code'=>$resp_code,'message'=>$message,'data'=>$data));
}


function create_firewall_rule($id, $action, $sip, $sport, $dip, $dport) {
    return json_encode(array('Id' => '1',
        'Action' => 'Allow',
        'Source Ip' => 'Any',
        'Source Port' => 'Any',
        'Destinatio Ip' => '10.0.0.2',
        'Destination Port' => '443'));
}

function delete_firewall_rule($id) {
  return true;
}
?>
