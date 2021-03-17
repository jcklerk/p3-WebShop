<?php
require "../include/nav.php";
require '../include/class/AdminProductClass.php';

if (isset($_POST['naam']) && isset($_POST['img']) && isset($_POST['prijs']) && isset($_POST['btw']) && isset($_POST['categorie'])) {
    $lang_post = array();
    foreach ($arraylang as $forlang) {
        $lang_post[$forlang['taal_id']] = array('taal_id' => $forlang['taal_id'] ,'beschrijving' => $_POST[$forlang['taal_id'].':beschrijving']);
    }
    (new AdminProductClass($_POST['naam'], $_POST['img'], $_POST['prijs'], $_POST['btw'], $_POST['categorie'], $lang_post))->ProductInsert();
    var_dump($lang_post);
}

?>
<link rel="stylesheet" href="../css/admin.css">
<body style="text-align: center; background: gray">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container">
    <?php
    require '../include/sidenav.php';
    ?>
    <form action="" method="post" style="margin-top: 200px; margin-left: 40%;="register-form">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="naam">NAAM</label>
                <input name="naam" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="img">IMG</label>
                <input name="img" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="prijs">PRIJS</label>
                <input name="prijs" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="btw">BTW</label>
                <input name="btw" class="form-control" autocomplete="off" type="text" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
            <label for="btw">Categorie</label>
      <br>  <select id="categorie" name="categorie" style="background: lightslategray; border-color: transparent" required>
            <option value="0">chinese</option>
            <option value="1">koreans</option>
            <option value="2">japans</option>

        </select>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
       <br></brf> <input type="submit" name="add" value="add" style="background: lightslategray; border-color: transparent;">
        </div>
    <?php foreach ($arraylang as $forlang): ?>
        <div class="col">
            <div class="">
                <label for="img">TAAL: <?php echo $forlang["taal_naam"]?></label>
                <br>
                <label for="img">beschrijving</label>
                <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:beschrijving" class="form-control"></textarea>
            </div>
        </div>
    <?php endforeach; ?>
    </form>
</div><br><br>
</body>

<?php
require "../include/footer.php";
?>
