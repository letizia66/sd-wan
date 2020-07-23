<?php

function get_user_id($name) {
  return $name;
}

function isAuthenticated($name, $password) {
  if ($name == 'admin') {
       if ($password == 'admin') {
         return true;
       }
   } else {
     if ($name == 'letizia') {
       if ($password == 'letizia') {
         return true;
       }
     }
   }
  return false;
}

function get_users() {
  $data[] = array(
    "Name" => 'letizia',
    "E-mail" => 'letizia@example.com',
    "Policy Id" => 'shdhdh-sjsjsj'
  );
  $data[] = array(
    "Name" => 'michele',
    "E-mail" => 'michele@example.com',
    "Policy Id" => 'shdhdh-sjsjsj'
  );

  return json_decode(json_encode($data));
}

function get_user($name) {
  $data = array(
    "Name" => $name,
    "E-mail" => $name.'@example.com',
    "Policy Id" => 'shdhdh-sjsjsj'
  );
  return json_encode($data);
}

function delete_user($name) {
    return true;
}

function create_user($name, $password, $email, $policyid) {
    return get_user($name);
}

function is_admin() {
  return ($_SESSION['name'] == 'admin');
}
?>
