<?php
/**
 *
 */
class LoginClass
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
    $login = $pdo->prepare("SELECT `user_id`,`username`,`password`,`type` FROM `user` WHERE `username` = :username");
    $login->bindParam(':username', $this->username);
    $login->execute();
    $arraylogin = $login->fetch();
    if (!empty($arraylogin)) {
      if (password_verify($this->password, $arraylogin['password'])) {
        $_SESSION['user_id'] = $arraylogin['user_id'];
        $_SESSION['username'] = $arraylogin['username'];
        $_SESSION['user_type'] = $arraylogin['type'];
        if (isset($_SESSION['redirect_user'])) {
          $redirect = $_SESSION['redirect_user'];
          unset($_SESSION['redirect_user']);
          echo '<script type="text/javascript"> window.location.href = "'.$url.$redirect.'"</script>';
        } else{
          echo '<script type="text/javascript"> window.location.href = "'.$url.'account.php"</script>';
        }
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
