<?php
require 'include/nav.php';
require "include/class/ShopProductClass.php";
(new ShopProductClass($_GET['product_nr'],$url))->Product();
?>










<?php
require 'include/footer.php';
?>
