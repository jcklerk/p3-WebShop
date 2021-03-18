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

if (isset($_POST['Webshop_img']) && isset($_POST['Webshop_Cat']) && isset($_POST['Webshop_Prijs']) && isset($_POST['Webshop_BTW'])) {
    $lang_post = array();
    foreach ($arraylang as $forlang) {
      $lang_post[$forlang['taal_id']] = array('taal_id' => $forlang['taal_id'] , 'naam' => $_POST[$forlang['taal_id'].':naam'], 'beschrijving' => $_POST[$forlang['taal_id'].':beschrijving']);
    }
    (new AdminProductClass($_POST['Webshop_img'], $_POST['Webshop_Prijs'], $_POST['Webshop_BTW'], $_POST['Webshop_Cat'], $lang_post))->ProductInsert();
    var_dump($_POST);
    var_dump($lang_post);
}

?>
<br><br><br><br>
<br>
<h1>Add Product</h1>
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
      <div class="container">
        <form action="" method="post">
        <div class="row row-cols-2">
          <div class="col">
                  <label for="Webshop_img">IMG</label>
                  <input name="Webshop_img" class="form-control" type="text" autocomplete="off" required>
              </div>
            <div class="col">
                  <label for="Webshop_Cat">Categorie</label>
                  <input name="Webshop_Cat" class="form-control" type="text" autocomplete="off" required>
              </div>
            <div class="col">
                  <label for="Webshop_Prijs">Prijs</label>
                  <input name="Webshop_Prijs" class="form-control" type="number" autocomplete="off" required>
              </div>
            <div class="col">
                  <label for="Webshop_BTW">BTW</label>
                  <input name="Webshop_BTW" class="form-control" autocomplete="off" type="number" required>
            </div>
          <?php foreach ($arraylang as $forlang): ?>
                <div class="col">
                <div class="">
                    <label for="">TAAL: <?php echo $forlang["taal_naam"]?></label>
                    <br>
                    <label for="">Naam</label>
                    <input required name="<?php echo $forlang['taal_id'];?>:naam" class="form-control"></textarea>
                </div>
                <div class="">
                    <label for="">Beschrijving</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:beschrijving" class="form-control"></textarea>
                </div>
              </div>
          <?php endforeach; ?>
          </div>
          <br>
          <input type="submit" class="btn btn-outline-primary" name="add" value="add">
      </form>
  </div><br><br>
  </div>
  </div>
</div>
</body>

<?php
require "../include/footer.php";
?>
