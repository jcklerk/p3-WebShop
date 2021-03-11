<?php
require "../include/nav.php";
require '../include/class/AdminProductClass.php';

if (isset($_POST['naam']) && isset($_POST['img']) && isset($_POST['prijs']) && isset($_POST['btw']) && isset($_POST['categorie'])) {
    echo (new AdminProductClass($_POST['naam'], $_POST['img'], $_POST['prijs'], $_POST['btw'], $_POST['categorie']))->ProductInsert();
}

?>
<br><br><br><br><br>
<body style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
    <form action="" method="post" style="margin-top: 200px; margin-left: 40%" class="register-form">

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
      <br>  <select id="categorie" name="categorie" required>
            <option value="0">chinese</option>
            <option value="1">koreans</option>
            <option value="2">japans</option>

        </select>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
       <br></brf> <input type="submit" name="add" value="add">
        </div>
    </form>
</div><br><br>
</body>

<?php
require "../include/footer.php";
?>
