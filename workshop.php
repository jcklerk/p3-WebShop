<?php
require "include/nav.php";
require "include/class/WorkShopClass.php";
?>
<title>Workshop - Wok & Roll</title>
<body class="bc-gray-black">
<?php (new WorkShopClass($url))->WorkShopGetAll(); ?>
</body>

<?php
require "include/footer.php";
?>
