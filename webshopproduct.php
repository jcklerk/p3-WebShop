<title>Product - Wok & Roll</title>
<?php
require 'include/nav.php';
require "include/class/ShopProductClass.php";
(new ShopProductClass($_GET['product_nr']))->Product();
?>










<?php
require 'include/footer.php';
?>
