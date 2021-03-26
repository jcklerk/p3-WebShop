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
//require "../include/class/UsersClass.php";
$empty = '';
?>
<title>Users - Wok & Roll</title>
<br><br><br><br>
<br>
<h1>Users</h1>
<br>

<body style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/admin.css">
<div class="container" style="min-height: 70%;">
  <div class="row">
      <?php
      require '../include/sidenav.php';
      ?>
    <div class="col-9">

<table class="table table-edit c-red" style="width: 100%;">
    <tbody>
    <tr class="c-border">
        <th scope="col" >User ID</th>
        <th scope="col" >Full name</th>
        <th scope="col">woonplaats</th>
        <th scope="col">straatnaam</th>
        <th scope="col">huisnummer</th>
        <th scope="col">postcode</th>
    </tr>

    <?php// (new FactuurClass($empty))->GetAllFacatuur(); ?>

    </tbody>
</table>

</div>
</div>
</div>
</body>



<?php
require "../include/footer.php";
?>
