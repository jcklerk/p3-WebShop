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
$empty = '';

$workshop_old_data = (new AdminWorkshopClass($empty, $empty, $empty, $empty))->WorkShopData();
//print_r($workshop_old_data);
if (isset($_POST['workshop_img']) && isset($_POST['video']) && isset($_POST['img'])) {
    $lang_post = array();
    foreach ($arraylang as $forlang) {
      $lang_post[$forlang['taal_id']] = array('taal_id' => $forlang['taal_id'] , 'title' => $_POST[$forlang['taal_id'].':title'], 'ingredienten' => $_POST[$forlang['taal_id'].':ingredienten'], 'benodigdheden' => $_POST[$forlang['taal_id'].':benodigdheden'], 'maken' => $_POST[$forlang['taal_id'].':maken']);
    }
    (new AdminWorkshopClass($_POST['workshop_img'], $_POST['video'], $_POST['img'], $lang_post))->WorkshopUpdate();
    //var_dump($_POST);
    //var_dump($lang_post);
}
?>
<title>Edit Workshop - Wok & Roll</title>
<br><br><br><br>
<br>
<h1>Edit Workshop</h1>
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
                  <label for="workshop_img">IMG</label>
                  <input name="workshop_img" class="form-control" type="text" autocomplete="off" required value="<?php echo $workshop_old_data[0]['workshop_img']; ?>">
              </div>
            <div class="col">
                  <label for="video">VIDEO (youtube)</label>
                  <input name="video" class="form-control" type="text" autocomplete="off" required value="<?php echo $workshop_old_data[0]['video']; ?>">
              </div>
            <div class="col">
                  <label for="img">IMG 2</label>
                  <input name="img" class="form-control" autocomplete="off" type="text" required value="<?php echo $workshop_old_data[0]['img']; ?>">
            </div>
            <div class="col">

                </div>
                <?php
                $count_array = array();
                foreach ($arraylang as $forlang){
                  $count = count($count_array);
                  ?>
                <div class="col">
                  <div class="">
                          <label for="naam">LANGUAGE: <?php echo $forlang["taal_naam"]?></label>
                          <br>
                          <label for="naam">NAME</label>
                          <input name="<?php echo $forlang['taal_id'];?>:title" class="form-control" type="text" autocomplete="off" required  value="<?php echo $workshop_old_data[$count]['workshop_title']; ?>">
                      </div>
                <div class="">

                    <label for="img">INGREDIENTS</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:ingredienten" class="form-control"><?php echo $workshop_old_data[$count]['ingredienten']; ?></textarea>
                </div>
                <div class="">
                    <label for="img">SUPPLIES</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:benodigdheden" class="form-control"><?php echo $workshop_old_data[$count]['benodigdheden']; ?></textarea>
                </div>
                <div class="">
                    <label for="img">INSTRUCTIONS</label>
                    <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:maken" class="form-control"><?php echo $workshop_old_data[$count]['maken']; ?></textarea>
                </div>
              </div>
          <?php
          array_push($count_array, '#');
          } ?>
          </div>
          <br>
          <input type="submit" class="btn btn-outline-primary" name="Edit" value="Edit">
      </form>
  </div><br><br>
  </div>
  </div>
</div>
</body>

<?php
require "../include/footer.php";
?>
