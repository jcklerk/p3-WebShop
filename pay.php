<?php
require "include/config.php";
require "include/class/CreateFactuurClass.php";

if(isset($_SESSION['user_id'])){
  if (!empty($_SESSION['cart'])) {
    echo "vol";
    print_r($_SESSION['cart']);
    (new CreateFactuurClass($_SESSION['user_id'],$_SESSION['cart']))->Factuur();
  } else {
    //header('Location:'. $url);
    echo "leeg";
  }
  unset($_SESSION['cart']);
  header('Location: '.$url.'account.php');
} else {
  $_SESSION['redirect_user'] = 'pay.php';
  header('Location: '.$url.'login.php');
}


 ?>
