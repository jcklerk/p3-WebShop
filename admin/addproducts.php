<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
require "../include/nav.php";
//require '../include/class/AdminClass.php';
//(new FactuurClass($_SESSION['user_id']))->GetFacatuur();

?>
<style>

    body {
        background-image: url("https://cdn.discordapp.com/attachments/773519839058591754/816963455977652254/unknown.png");
        background-color: #cccccc;
    }
</style>
<body>
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
