<?php
require "inc/utility.php";

session_start();
session_destroy();
// Redirect to the login page:
redirect("/");
?>
