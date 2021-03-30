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

if (isset($_POST['workshop_img']) && isset($_POST['video']) && isset($_POST['img'])) {
    $lang_post = array();
    foreach ($arraylang as $forlang) {
      $lang_post[$forlang['taal_id']] = array('taal_id' => $forlang['taal_id'] , 'title' => $_POST[$forlang['taal_id'].':title'], 'ingredienten' => $_POST[$forlang['taal_id'].':ingredienten'], 'benodigdheden' => $_POST[$forlang['taal_id'].':benodigdheden'], 'maken' => $_POST[$forlang['taal_id'].':maken']);
    }
    (new AdminWorkshopClass($_POST['workshop_img'], $_POST['video'], $_POST['img'], $lang_post))->WorkshopInsert();
    //var_dump($lang_post);
}

?>
<title>Add Workshop - Wok & Roll</title>
<br><br><br><br>
<br>
<h1>Add Workshop</h1>
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
      <div class="container">
        <form action="" method="post">
        <div class="row row-cols-2">
            <div class="col">
                  <label for="workshop_img">IMG</label>
                  <input name="workshop_img" class="form-control" type="text" autocomplete="off" required>
              </div>
            <div class="col">
                  <label for="video">VIDEO (youtube)</label>
                  <input name="video" class="form-control" type="text" autocomplete="off" required>
              </div>
            <div class="col">
                  <label for="img">IMG 2</label>
                  <input name="img" class="form-control" autocomplete="off" type="text" required>
            </div>
            <div class="col">

                </div>
          <?php foreach ($arraylang as $forlang): ?>
                <div class="col">
                  <div class="">
                          <label for="naam">LANGUAGE: <?php echo $forlang["taal_naam"]?></label>
                          <br>
                          <label for="naam">NAME</label>
                          <input name="<?php echo $forlang['taal_id'];?>:title" class="form-control" type="text" autocomplete="off" required>
                      </div>
                <div class="">

                    <label for="img">INGREDIENTS</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:ingredienten" class="form-control"></textarea>
                </div>
                <div class="">
                    <label for="img">SUPPLIES</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:benodigdheden" class="form-control"></textarea>
                </div>
                <div class="">
                    <label for="img">INSTRUCTIONS</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:maken" class="form-control"></textarea>
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
