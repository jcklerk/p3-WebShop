<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
require "../include/nav.php";
//require '../include/class/AdminClass.php';
//(new FactuurClass($_SESSION['user_id']))->GetFacatuur();

?>

<body>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
    <form action="" method="post" class="register-form">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="username">NAAM</label>
                <input name="username" class="col-lg-6 login-btm login-button-twee" type="text" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="password">IMG</label>
                <input name="password" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="voornaam">PRIJS</label>
                <input name="voornaam" class="form-control" type="text" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4">
                <label for="tussenvoegsel">BTW</label>
                <input name="tussenvoegsel" class="form-control" type="text">
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="achternaam">CATOGORIE</label>
                    <input name="achternaam" class="form-control" type="text" required>
                </div>
            </div>

</body>

<?php
require "../include/footer.php";
?>
