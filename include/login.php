<?php
require __DIR__ . '/config.php';
?>
<head>
  <link rel="stylesheet" href="../css/login.css">
  <title>login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
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

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="submit" class="btn btn-outline-primary" value="LOGIN" name="LOGIN">

                                    <div class="col-lg-6 login-btm login-button">
                                        <a href="#" class="btn btn-outline-primary">CREAT NEW USER</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
<?php
if (isset($_POST['LOGIN'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $pdo->prepare("SELECT `user_id`,`username`,`password` FROM `user` WHERE `username` = :username");
  $query->bindParam(':username', $username);
  $query->execute();
  $arraytest = $query->fetchAll();
  print_r($arraytest);
  echo $password;
  if (password_verify($password, $arraytest['0']['password'])) {
    header("Location: https://localhost/");
  } else {
    echo "fout!";
  };
};
 ?>
