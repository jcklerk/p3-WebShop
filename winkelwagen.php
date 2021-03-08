<?php
    session_start();
    $_SESSION['cart'] = array('1', '6');
    require 'include/nav.php';
    $arraycart = (new LangClass())->LangGetCart();
    require 'include/class/ShoppingCartClass.php';
?>
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
