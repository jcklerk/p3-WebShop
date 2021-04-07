<?php
require "include/nav.php";
require "include/class/ShopClass.php";

?>
<title>WebShop - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">
  <div class="container container-web">
      <div class="row row-web grid-gap" style="overflow: hidden;">
          <div class="image-1-3 img-chinesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=0'">
              <div class="text-center ts-1">
                  <h1 class="fos-2 op"><?php echo $arraytekst['cat_chinese'];?></h1>
              </div>
          </div>
          <div class="image-1-3 img-japanesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=1'">
              <div class="text-center ts-1" >
                  <h1 class="fos-2"><?php echo $arraytekst['cat_japanese'];?></h1>
              </div>
          </div>
          <div class="image-1-3 img-indian d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=2'">
              <div class="text-center ts-1">
                  <h1 class="fos-2"><?php echo $arraytekst['cat_indian'];?></h1>
              </div>
          </div>
      </div>
      <div class="row row-web grid-gap" style="overflow: hidden;">
          <div class="image-1-3 img-tai d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=3'">
              <div class="text-center ts-1">
                  <h1 class="fos-2"><?php echo $arraytekst['cat_tai'];?></h1>
              </div>
          </div>
          <div class="image-1-3 img-vait d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=4'">
              <div class="text-center ts-1">
                  <h1 class="fos-2"><?php echo $arraytekst['cat_viat'];?></h1>
              </div>
          </div>
          <div class="image-1-3 img-wok d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $url;?>webshop.php/?cat=5'">
              <div class="text-center ts-1">
                  <h1 class="fos-2"><?php echo $arraytekst['cat_wok'];?></h1>
              </div>
          </div>
      </div>
  </div>
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
