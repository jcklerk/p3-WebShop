<?php
require "include/nav.php";
echo $_GET['cat'];

?>

<body class="bc-gray-black">

    <div class="container container-web">

        <div class="row row-web">
            <div class="image-1-3 img-chinesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=0'">
                <div class="text-center ts-1">
                    <h1 class="fos-2 op">Chinese food</h1>
                </div>
            </div>
            <div class="image-1-3 img-japanesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=1'">
                <div class="text-center ts-1" >
                    <h1 class="fos-2">Japanese food</h1>
                </div>
            </div>
            <div class="image-1-3 img-koreanfood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=2'">
                <div class="text-center ts-1">
                    <h1 class="fos-2">Korean food</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-web-prod row-cols-1 row-cols-md-4 g-4 c-red"></div>
<?php
(new ShopClass($_GET['cat']))->GetProductCat();
?>
    </body>

<?php
require "include/footer.php";
?>
