<?php
    session_start();
    $_SESSION['cart'] = array("1"=>array("Product"=>"1","Aantal"=>"2"),"2"=>array("Product"=>"2","Aantal"=>"5"));
    if (!empty($_POST['product'])) {
      foreach ($_SESSION['cart'] as $cart) {
        if($_POST['product'] == $cart['Product']){
          $aanpassen=array($_POST['product']=>array("Product"=>$_POST['product'],"Aantal"=>$_POST['aantal']));
          $_SESSION['cart'] = array_replace($_SESSION['cart'], $aanpassen);
        }
      }
    }
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
