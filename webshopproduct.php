<title>Product - Wok & Roll</title>
<body class="d-flex flex-column h-100">


<?php
require 'include/nav.php';
require "include/class/ShopProductClass.php";
(new ShopProductClass($_GET['product_nr']))->Product();
echo "</body>";
require 'include/footer.php';
?>
