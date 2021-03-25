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
require '../include/class/AdminProductClass.php';
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

        <?php
        $products = (new AdminProductsClass())->GetAllProducts();
        foreach ($products as $product): ?>
        <div class="col">
          <div class="card" style="width: 100%; height: 100%; border: 1px solid black">
              <img height="200" width="100%" style="object-fit: cover;" src="<?php echo $product['img']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h4 class="center"> <?php echo $product['naam']?> </h4>
                <a href="<?php echo $url.'admin/editproducts.php?product='.$product['product_nr'] ?>" class="btn btn-warning align-bottom">Edit</a>
                <button type="button" onclick="rmproducts(<?php echo $product['product_nr']; ?>, '<?php echo $product['naam']; ?>');" class="btn btn-danger align-self-end">Remove</button>
              </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</body>
<script>
function rmproducts(id, naam) {
  var r = confirm("Confirm Product Remove " + naam);
  if (r == true) {
    window.location.href = "<?php echo $url; ?>admin/rmproducts.php?product="+id;
  }
}
</script>

<?php
require "../include/footer.php";
?>
