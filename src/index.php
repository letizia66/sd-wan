<?php
require "inc/utility.php";
if (!check_session()) {
  include "inc/landing.php";
} else {
  include "inc/index.php";
}
?>
