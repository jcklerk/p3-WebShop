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
$arrayaccount = (new LangClass())->LangGetAccount();
?>
<title>Account - Wok & Roll</title>
<br>
<br>
<br>
<body class="bc-gray-lblack d-flex flex-column h-100">

<table class="table table-edit c-red" style="">
    <tbody>
    <tr class="c-border">
        <th scope="col" ><?php echo $arrayaccount['order_nr']; ?> </th>
        <th scope="col"><?php echo $arrayaccount['product']; ?></th>
        <th scope="col"><?php echo $arrayaccount['datum']; ?></th>
        <th scope="col"><?php echo $arrayaccount['aantal']; ?></th>
        <th scope="col"><?php echo $arrayaccount['totaal']; ?></th>
        <th scope="col"><?php echo $arrayaccount['verzend']; ?></th>
    </tr>

    <?php (new FactuurClass($_SESSION['user_id']))->GetFacatuur(); ?>

    </tbody>
</table>





</body>



<?php
require "include/footer.php";
?>
