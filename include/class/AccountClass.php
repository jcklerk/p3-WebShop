<?php
/**
 *
 */
class AccountClass
{
  private $dbClass;
  private $pdo;
  public $username;
  public $error;
  private $password;

  function __construct($username, $password)
  {
    $this->dbClass = new DBClass();
    $this->username = $username;
    $this->password = $password;
  }
  public function Login(){
    $pdo = $this->dbClass->makeConnection();
    $login = $pdo->prepare("SELECT `user_id`,`username`,`password` FROM `user` WHERE `username` = :username");
    $login->bindParam(':username', $this->username);
    $login->execute();
    $arraylogin = $login->fetch();
    if (!empty($arraylogin)) {
      if (password_verify($this->password, $arraylogin['password'])) {
        $_SESSION['user_id'] = $arraylogin['user_id'];
        $_SESSION['username'] = $arraylogin['username'];
        echo '<script type="text/javascript"> window.location.href = "'.$url.'account.php"</script>';
      } else {
        $error = "Wachtwoord niet Correct!";
      }
    } else {
      $error = "Account niet gevonden";
    }
    return $error;
  }
}
?>