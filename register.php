<?php
include __DIR__ . '/include/config.php';
require __DIR__ . "/include/class/RegisterClass.php";
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['straatnaam']) && isset($_POST['huisnummer']) && isset($_POST['postcode']) && isset($_POST['woonplaats'])) {
	echo (new RegisterClass($_POST['username'], $_POST['password'], $_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['straatnaam'], $_POST['huisnummer'], $_POST['postcode'], $_POST['woonplaats']))->Register();
}
?>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/login.css">
<!-- Include the above in your HEAD tag--->
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<div class="container-fluid">
	 <form action="" method="post" class="register-form">
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="username">USERNAME</label>
               <input name="username" class="col-lg-6 login-btm login-button-twee" type="text" required>
           </div>
      </div>
      <div class="row">
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD</label>
               <input name="password" class="form-control" type="password" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="voornaam">VOORNAAM</label>
               <input name="voornaam" class="form-control" type="text" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="tussenvoegsel">TUSSENVOEGSEL</label>
               <input name="tussenvoegsel" class="form-control" type="text">
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="achternaam">ACHTERNAAM</label>
               <input name="achternaam" class="form-control" type="text" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="straatnaam">STRAATNAAM</label>
               <input name="straatnaam" class="form-control" type="text" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="huisnummer">HUISNUMMER</label>
               <input name="huisnummer" class="form-control" type="number" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="postcode">POSTCODE</label>
               <input name="postcode" class="form-control" type="text" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="woonplaats">WOONPLAATS</label>
               <input name="woonplaats" class="form-control" type="text" required>
           </div>
      </div>
      <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           <button class="btn btn-default regbutton">Register</button>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           <a href="login.php" class="btn btn-default logbutton">Sign up</a>
          </div>
      </div>
    </form>
</div>
</body>
<?php

?>
