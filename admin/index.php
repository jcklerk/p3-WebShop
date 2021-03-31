<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();
require "../include/nav.php";
if (!empty($_SESSION['user_type'])) {
  if ($_SESSION['user_type'] == 'klant') {
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'account.php";</script>';
    exit;
  } elseif ($_SESSION['user_type'] !== 'admin') {
    session_destroy();
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'login.php/";</script>';
    exit;
  }
} else {
  echo '<script type="text/javascript">window.location.href = "'.$srv_url.'login.php/";</script>';
  exit;
}
require "../include/class/FactuurClass.php";
$empty = '';
?>
<title>Orders - Wok & Roll</title>
<h1 class="mt">Orders</h1>
<br>
<body class="d-flex flex-column h-100" style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/admin.css">
<div class="container">
  <div class="row">
      <?php
      require '../include/sidenav.php';
      ?>
    <div class="col-9">

<table class="table table-edit c-red" style="width: 100%;">
    <tbody>
    <tr class="c-border">
        <th scope="col" >Order nummer</th>
        <th scope="col" >User ID</th>
        <th scope="col">Product</th>
        <th scope="col">Date</th>
        <th scope="col">Amount</th>
        <th scope="col">total product</th>
        <th scope="col">shipping costs</th>
    </tr>

    <?php (new FactuurClass($empty))->GetAllFacatuur(); ?>

    </tbody>
</table>

</div>
</div>
</div>
</body>



<?php
require "../include/footer.php";
?>
