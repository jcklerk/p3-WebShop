<?php
require __DIR__ . "/nav.php";
require __DIR__ . "/class/AccountClass.php";
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
  $error = (new AccountClass($username, $password))->Login();
  echo $error;

}

 ?>
