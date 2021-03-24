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
<title>Products - Wok & Roll</title>
<br><br><br><br>
<br>
<h1>Products</h1>
<br>
<body style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/admin.css">
<div class="container">
  <div class="row">
      <?php
      require '../include/sidenav.php';
      ?>
    <div class="col-9">
      <div class="row row-web-prod row-cols-1 row-cols-md-4 g-4 c-red">
        <?php for ($i=1; $i <= 5 ; $i++): ?>
        <div class="col">
          <div class="card" style="width: 100%; border: 1px solid black">
              <img src="../img/ja.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h3 class="center"> title </h3>
                <button type="button" class="btn btn-warning">Edit</button>
                <button type="button" class="btn btn-danger">Remove</button>
              </div>
          </div>
        </div>
      <?php endfor; ?>
      </div>
    </div>
  </div>
</div>
</body>

<?php
require "../include/footer.php";
?>
