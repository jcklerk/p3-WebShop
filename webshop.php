<?php
require "include/nav.php";
require "include/class/ShopClass.php";
require "include/class/CategorieClass.php";

?>
<title>WebShop - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">
<?php  (new CategorieClass($url))->cat_taal();?>
    <div class="row row-web-prod row-cols-1 row-cols-md-4 g-4 c-red">
    <?php
    if (isset($_GET['cat'])) {
      (new ShopClass($_GET['cat'],$url))->GetProductCat();
    }else{
      $empty = '';
      (new ShopClass($empty, $url))->GetProductall();
    }
    ?>
    </div>
    </div>
    </body>

<?php
require "include/footer.php";
?>
