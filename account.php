<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();

require "include/nav.php";
require "include/class/ShopClass.php";
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
    <tr>
        <th scope="row">1</th>
        <td>beker</td>
        <td>3-3-2021</td>
        <td>onderweg</td>
        <td>€20.42</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>knufel</td>
        <td>5-3-2021</td>
        <td>onderweg</td>
        <td>€24.-</td>

    </tr>
    <tr>
        <th scope="row">3</th>
        <td>banaan</td>
        <td>27-2-2021</td>
        <td>bezorgt</td>
        <td>€20.-</td>

    </tr>
    </tbody>
</table>





</body>



<?php
require "include/footer.php";
?>