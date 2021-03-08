<?php
    session_start();
    $_SESSION['cart'] = array('fuck', 'of');
    require 'include/nav.php';
    $arraycart = (new LangClass())->LangGetCart();
?>
<link rel="stylesheet" href="css/winkelwagen.css">
<div class="card list-width">
    <div class="card-header">
        <?php
            echo $arraycart['shoppingcart'];
        ?>
    </div>
    <ul class="list-group list-group-flush">
        <?php
            foreach ($_SESSION['cart'] as $a){
                echo '
                <li class="list-group-item"> 
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="..." alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">'. $a .'</h5>
                        <p class="card-text"></p>
                      </div>
                    </div>
                  </div>
                </div>
                </li>';
            }

        ?>
    </ul>
    <div class="card-footer">
        <?php
        echo $arraycart['checkout'];
        ?>
    </div>
</div>
