<?php
require "inc/utility.php";
if (!check_session()) {
  if ((isset($_POST["uname"])) && (isset($_POST["psw"]))) {
    // define variables and set to empty values
    $name = $email = $password = $remember = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_input($_POST["uname"]);
        $password = clean_input($_POST["psw"]);
        $remember = clean_input($_POST["remember"]);
    }
    if (isAuthenticated($name, $password)) {
        $_SESSION['logged_in'] = TRUE;
      	$_SESSION['name'] = $name;
      	$_SESSION['id'] = get_user_id($name);
        $_SESSION['LAST_ACTIVITY'] = time();
    }

  }

}
redirect("/");
?>
