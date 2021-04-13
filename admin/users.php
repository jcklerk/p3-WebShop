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
require "../include/class/showusers.php";
$empty = '';
?>
<title>Orders - Wok & Roll</title>
<h1 class="mt">Users</h1>
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

<table class="table table-edit c-red" style="height: auto; width: 100%;">
    <tbody>
    <tr class="c-border">
        <th scope="col" >User ID</th>
        <th scope="col" >username</th>
        <th scope="col">name</th>
        <th scope="col">prefix</th>
        <th scope="col">surname</th>
        <th scope="col">street name</th>
        <th scope="col">house number</th>
        <th scope="col">Postal Code</th>
    </tr>

    <?php (new showusers($empty))->ShowAllUsers(); ?>

    </tbody>
</table>

</div>
</div>
</div>
</body>



<?php
require "../include/footer.php";
?>
