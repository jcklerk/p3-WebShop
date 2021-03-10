<?php
/**
 *
 */
class AdminClass
{
  private $dbClass;
  private $pdo;
  private $naam;
  private $img;
  private $prijs;
  private $btw;
  private $categorie;


  function __construct($naam, $img, $prijs, $btw, $categorie)
  {
    $this->dbClass = new DBClass();
    $this->naam = $naam;
    $this->img = $img;
    $this->prijs = $prijs;
    $this->btw = $btw;
    $this->categorie = $categorie;
  }

  public function ProductInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $login = $pdo->prepare("SELECT `user_id`,`username`,`password` FROM `user` WHERE `username` = :username");
    $login->bindParam(':username', $this->username);
    $login->execute();
    return;
  }
}
?>
