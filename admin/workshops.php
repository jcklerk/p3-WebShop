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
require '../include/class/AdminWorkshopClass.php';
?>
<title>Workshops - Wok & Roll</title>
<br><br><br><br>
<br>
<h1>Workshops</h1>
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

        <?php
        $products = (new AdminWorkshopsClass())->GetAllWorkshops();
        foreach ($products as $product): ?>
        <div class="col">
          <div class="card" style="width: 100%; height: 100%; border: 1px solid black">
              <img height="200" width="100%" style="object-fit: cover;" src="<?php echo $product['workshop_img']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h4 class="center"> <?php echo $product['workshop_title']?> </h4>
                <a href="<?php echo $url.'admin/editworkshop.php?workshop='.$product['workshop_id'] ?>" class="btn btn-warning align-bottom">Edit</a>
                <a class="btn btn-danger align-self-end">Remove</a>
              </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</body>

<?php
require "../include/footer.php";
?>
