<?php
require "include/config.php";
require "include/class/CreateFactuurClass.php";

if (!empty($_SESSION['cart'])) {
  echo "vol";
  print_r($_SESSION['cart']);
  (new CreateFactuurClass($_SESSION['user_id'],$_SESSION['cart']))->Factuur();
} else {
  //header('Location:'. $url);
  echo "leeg";
}

unset($_SESSION['cart']);
 ?>
