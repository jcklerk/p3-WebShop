<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();
//session_start();
require "include/nav.php";
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

require "include/class/FactuurClass.php";
?>
<title>Account - Wok & Roll</title>
<br>
<br>
<br>
<body class="bc-gray-lblack d-flex flex-column h-100">

<table class="table table-edit c-red fos-3" style="height: auto; margin-bottom: 6rem;">
    <tbody>
    <tr class="c-border">
        <th scope="col" ><?php echo $arraytekst['order_nr']; ?> </th>
        <th scope="col"><?php echo $arraytekst['datum']; ?></th>
        <th scope="col"><?php echo $arraytekst['verzend']; ?></th>
    </tr>

    <?php (new FactuurClass())->GetFacatuur($_SESSION['user_id'], $url); ?>

    </tbody>
</table>






</body>



<?php
require "include/footer.php";
?>
