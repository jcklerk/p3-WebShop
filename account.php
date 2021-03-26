<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();
session_start();
if (!empty($_SESSION['user_type'])) {
  if ($_SESSION['user_type'] == 'admin') {
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'admin/";</script>';
    exit;
  } elseif ($_SESSION['user_type'] !== 'klant') {
    session_destroy();
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'login.php/";</script>';
    exit;
  }
} else {
  echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'login.php/";</script>';
  exit;
}


require "include/nav.php";
require "include/class/FactuurClass.php";

?>
<title>Account - Wok & Roll</title>

<body class="bc-gray-lblack">

<table class="table table-edit c-red" style="">
    <tbody>
    <tr class="c-border">
        <th scope="col" >Oder nummer</th>
        <th scope="col">product</th>
        <th scope="col">datum</th>
        <th scope="col">aantal</th>
        <th scope="col">totaal prodcut</th>
        <th scope="col">shipping costs</th>
    </tr>

    <?php (new FactuurClass($_SESSION['user_id']))->GetFacatuur(); ?>

    </tbody>
</table>





</body>



<?php
require "include/footer.php";
?>
