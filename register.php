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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container" style="height: 100%">
    <div class="row mx-auto justify-content-center" >
        <div class="col-lg-6 login-box mt-3" >
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
                <a href='https://localhost/Webshop/p3-WebShop/' style="text-decoration: none;">Back</a>
            </div>
            <div class="col-lg-12 login-title">
<!--                <div class="col-lg-3 col-md-2"><a href='https://localhost/Webshop/p3-WebShop/' style="text-decoration: none; color: #B53333; font-size: 20px">Back</a></div>-->
                New user
            </div>
            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="post">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">VOORNAAM</label>
                            <input name="voornaam" class="form-control" type="text">
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">TUSSENVOEGSEL</label>
                            <input name="tussenvoegsel" class="form-control" type="text" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">ACHTERNAAM</label>
                            <input name="achternaam" class="form-control" type="text" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">STRAATNAAM</label>
                            <input name="straatnaam" class="form-control" type="text" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">HUISNUMMER</label>
                            <input name="huisnummer" class="form-control" type="text" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">POSTCODE</label>
                            <input name="postcode" class="form-control" type="text" required>
                        </div>
                        <div class="from-group">
                            <label class="form-control-label">WOONPLAATS</label>
                            <input name="woonplaats" class="form-control" type="text" required>
                        </div>
                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                            </div>
                            <div class="col-lg-6 login-btm login-button-twee">
                                <a href="<?php echo $url;?>login.php" class="btn btn-outline-primary" style="float: left">LOGIN</a>
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <input type="submit" class="btn btn-outline-primary" value="CREAT USER" name="LOGIN" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
</body>