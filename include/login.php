<?php
require __DIR__ . '/config.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
  header("Location: ".$url."account.php");
}
$error = "";
?>
<head>
  <link rel="stylesheet" href="<?php echo $url; ?>/css/login.css">
  <title>login</title>
</head>

<?php
if (isset($_POST['LOGIN'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = $pdo->prepare("SELECT `user_id`,`username`,`password` FROM `user` WHERE `username` = :username");
  $query->bindParam(':username', $username);
  $query->execute();
  $arraytest = $query->fetchAll();
  if (!empty($arraytest)) {
    if (password_verify($password, $arraytest['0']['password'])) {
      $_SESSION['user_id'] = $arraytest['0']['user_id'];
      $_SESSION['username'] = $arraytest['0']['username'];
      header("Location: ".$url."account.php");
    } else {
      $error = "Wachtwoord niet Correct!";
    }
  } else {
    $error = "Account niet gevonden";
  }

  ;
};
 ?>
