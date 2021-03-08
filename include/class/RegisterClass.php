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
    if (isset($this->username) && isset($this->password) && isset($this->voornaam) && isset($this->achternaam) && isset($this->straatnaam) && isset($this->huisnummer) && isset($this->postcode) && isset($this->woonplaats)) {
        $q = $pdo->prepare('INSERT INTO `user` (`username`, `password`, `voornaam`, `tussenvoegsel`, `achternaam`, `straatnaam`, `huisnummer`, `postcode`, `woonplaats`) VALUES (NULL, :ui, :u, :p, :v, :t, :a, :s, :h, :pc, :w)');
        $q->bindParam(':u', $_POST['username']);
        $q->bindParam(':p', $_POST['password']);
        $q->bindParam(':v', $_POST['vornaam']);
        $q->bindParam(':t', $_POST['tussenvoegsel']);
        $q->bindParam(':a', $_POST['achternaam']);
        $q->bindParam(':s', $_POST['straatnaam']);
        $q->bindParam(':h', $_POST['huisnummer']);
        $q->bindParam(':pc', $_POST['postcode']);
        $q->bindParam(':w', $_POST['woonplaats']);
        $q->execute();
        header('Location: http://localhost/gebruiker/');
        return;
    }
  }
}