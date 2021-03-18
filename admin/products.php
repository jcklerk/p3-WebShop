<?php
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
 ?>

<div class="card" style="width: 17rem; border: 1px solid black">
    <img src="../img/ja.jpg" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text"><a href="yeet" style="margin-right: 200px; margin-left: 10px">edit</a><a href="yeett">add</a> </p>
    </div>
</div>
