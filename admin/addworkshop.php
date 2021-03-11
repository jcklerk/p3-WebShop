<?php
require "../include/nav.php";
require '../include/class/AdminWorkshopClass.php';

if (isset($_POST['workshop_title']) && isset($_POST['workshop_img']) && isset($_POST['video']) && isset($_POST['img'])) {
    echo (new AdminWorkshopClass($_POST['workshop_title'], $_POST['workshop_img'], $_POST['video'], $_POST['img']))->WorkshopInsert();
}

?>
<br><br><br><br><br>
<body style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
    <form action="" method="post" class="register-form">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="workshop_title">NAAM</label>
                <input name="workshop_title" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="workshop_img">IMG</label>
                <input name="workshop_img" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="video">VIDEO</label>
                <input name="video" class="form-control" type="text" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="img">IMG 2</label>
                <input name="img" class="form-control" autocomplete="off" type="text" required>
            </div>
        </div>
        <input type="submit" name="add" value="add">
    </form>
</div><br><br>
</body>

<?php
require "../include/footer.php";
?>
