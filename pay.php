<?php
require "include/config.php";

if (!empty($_SESSION['cart'])) {
  echo "vol";
  foreach ($_SESSION['cart'] as $product) {
  }
} else {
  //header('Location:'. $url);
  echo "leeg";
}


 ?>



<?php
$_SESSION['cart']['1']['Product'] = "1";
$_SESSION['cart']['1']['Aantal']  = "5";


 ?>
