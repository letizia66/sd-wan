<?php
require "inc/utility.php";
  if (!check_session()) {
    sendResponse(500,"Session expires!");
  } else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      sendResponse(200, "Firewall List", null);
    }
    if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
      if (delete_firewall_rule($_GET['id']))
        sendResponse(200,"Firewall rule deleted!", '{ "Id": "'.$_GET['id'].'"}' );
      else {
        sendResponse(500, "Failed to delete Firewall rule ". $_GET['id']);
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      sendResponse(200,"Firewall rule created!", create_firewall_rule($_POST['id'],$_POST['action'],
        $_POST['sourceip'],$_POST['sourceport'],$_POST['destinationip'],$_POST['destinationport']));
    }
  }
?>
