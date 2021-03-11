<?php
/**
 *
 */
class RegisterClass
{
  private $dbClass;
  private $pdo;
  public $username;
  private $password;
  private $voornaam;
  private $tussenvoegsel;
  private $achternaam;
  private $straatnaam;
  private $huisnummer;
  private $postcode;
  private $woonplaats;

  function __construct($username, $password, $voornaam, $tussenvoegsel, $achternaam, $straatnaam, $huisnummer, $postcode, $woonplaats)
  {
    $this->dbClass = new DBClass();
    $this->username = $username;
    $this->password = $password;
    $this->voornaam = $voornaam;
    $this->tussenvoegsel = $tussenvoegsel;
    $this->achternaam = $achternaam;
    $this->straatnaam = $straatnaam;
    $this->huisnummer = $huisnummer;
    $this->postcode = $postcode;
    $this->woonplaats = $woonplaats;
  }
  public function Register(){
    $pdo = $this->dbClass->makeConnection();
    $login = $pdo->prepare("SELECT `user_id`,`username`,`password` FROM `user` WHERE `username` = :username");
    $login->bindParam(':username', $this->username);
    $login->execute();
    $arraylogin = $login->fetch();
    if (empty($arraylogin)) {
      if (isset($this->username) && isset($this->password) && isset($this->voornaam) && isset($this->achternaam) && isset($this->straatnaam) && isset($this->huisnummer) && isset($this->postcode) && isset($this->woonplaats)) {
          $hashpass = password_hash($this->password, PASSWORD_DEFAULT);
          $q = $pdo->prepare('INSERT INTO `user` (`username`, `password`, `voornaam`, `tussenvoegsel`, `achternaam`, `straatnaam`, `huisnummer`, `postcode`, `woonplaats`) VALUES ( :u, :p, :v, :t, :a, :s, :h, :pc, :w)');
          $q->bindParam(':u', $this->username);
          $q->bindParam(':p', $hashpass);
          $q->bindParam(':v', $this->voornaam);
          $q->bindParam(':t', $this->tussenvoegsel);
          $q->bindParam(':a', $this->achternaam);
          $q->bindParam(':s', $this->straatnaam);
          $q->bindParam(':h', $this->huisnummer);
          $q->bindParam(':pc',$this->postcode);
          $q->bindParam(':w', $this->woonplaats);
          $q->execute();
          //header('Location: http://localhost/gebruiker/');
          return;
      }
    }
    else {
      ?> <div class="text-danger fs-1">
        <p>Username bestaat al! </p>
      </div> <?php
    }
  }
}
