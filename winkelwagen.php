<?php
    session_start();
    $_SESSION['cart'] = array(array("Prodcut"=>"1","Aantal"=>"2"),array("Prodcut"=>"2","Aantal"=>"25"));
    print_r($_SESSION['cart']);
    require 'include/nav.php';
    $arraycart = (new LangClass())->LangGetCart();
    require 'include/class/ShoppingCartClass.php';
?>
<style media="screen">
  body{
    width: 100%;
    height: 100%
  }
</style>
<body>


<link rel="stylesheet" href="css/winkelwagen.css">
<div class="card list-width">
    <div class="card-header">
        <?php
            echo $arraycart['shoppingcart'];
        ?>
    </div>
    <ul class="list-group list-group-flush">
      <?php (new ShoppingCartClass($_SESSION['cart']))->Cart(); ?>
    </ul>
    <div class="card-footer">
        <?php
        echo $arraycart['checkout'];
        ?>
    </div>
</div>
