<?php
require "include/nav.php";
require "include/class/WorkShopClass.php";
?>
<title>Workshop - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">
<?php (new WorkShopClass($url))->WorkShopGetAll(); ?>
</body>

<?php
require "include/footer.php";
?>
