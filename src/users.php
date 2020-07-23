<?php
require "inc/utility.php";
  if (!check_session()) {
    sendResponse(500,"Session expires!");
  } else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      sendResponse(200, "User List", get_users());
    }
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
      if (delete_user($_GET['uname']))
        sendResponse(200,"User deleted!", '{ "Name": "'.$_GET['uname'].'"}' );
      else {
        sendResponse(500, "Failed to delete user ". $_GET['uname']);
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      sendResponse(200,"User created!", create_user($_POST['uname'],$_POST['psw'],$_POST['email'],$_POST['policyid']));
    }
  }
?>
