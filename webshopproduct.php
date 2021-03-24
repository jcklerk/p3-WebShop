<title>Product - Wok & Roll</title>
<?php
require 'include/nav.php';
require "include/class/ShopProductClass.php";
(new ShopProductClass($_GET['product_nr']))->Product();
require 'include/footer.php';
?>