<?php
require "../include/nav.php";
//require '../include/class/AdminClass.php';
//(new FactuurClass($_SESSION['user_id']))->GetFacatuur();

if (isset($_POST['naam']) && isset($_POST['img']) && isset($_POST['prijs']) && isset($_POST['btw']) && isset($_POST['catogorie'])) {
    echo (new RegisterClass($_POST['naam'], $_POST['img'], $_POST['prijs'], $_POST['btw'], $_POST['catogorie']))->Register();
}
?>
<br><br><br><br><br><br><br><br>
<body style="text-align: center">
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
    <form action="" method="post" class="register-form">

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="naam">NAAM</label>
                <input name="naam" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="img">IMG</label>
                <input name="img" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="prijs">PRIJS</label>
                <input name="prijs" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="btw">BTW</label>
                <input name="btw" class="form-control" type="text">
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="catogorie">CATOGORIE</label>
                    <input name="catogorie" class="form-control" type="text" required>
                </div>
            </div>

</body>

<?php
require "../include/footer.php";
?>
