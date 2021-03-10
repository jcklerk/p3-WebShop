<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();

require "../include/nav.php";
require "../include/class/FactuurClass.php";

?>

    <body class="bc-gray-black">

    <table class="table table-edit c-red" style="">
        <tbody>
        <tr class="c-border">
            <th scope="col" >Oder nummer</th>
            <th scope="col">product</th>
            <th scope="col">datum</th>
            <th scope="col">Status</th>
            <th scope="col">totaal</th>
        </tr>

        <?php (new FactuurClass($_SESSION['user_id']))->GetFacatuur(); ?>

        </tbody>
    </table>
<table style="">
    <a href="products.php">Producten</a><br>
    <a href="https://www.paypal.com/paypalme/stephanbear">add producten</a><br>
    <a href="editproducts.php">edit Producten</a><br>
</table>




    </body>



<?php
require "../include/footer.php";
?>