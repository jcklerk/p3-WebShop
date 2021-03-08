<?php
    require 'include/nav.php';
?>
<link rel="stylesheet" href="css/winkelwagen.css">
<div class="card list-width">
    <div class="card-header">
        <?php
            require 'include/class/ShoppingCartClass.php';
        ?>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
    </ul>
    <div class="card-footer">
        Card footer
    </div>
</div>
