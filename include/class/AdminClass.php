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
    $login = $pdo->prepare("insert into product (naam, img, prijs, btw, categorie) value (:naam, :img, :prijs, :btw, :categorie)");
    $login->bindParam(':naam', $this->naam);
    $login->bindParam(':img', $this->img);
    $login->bindParam(':prijs', $this->prijs);
    $login->bindParam(':btw', $this->btw);
    $login->bindParam(':categorie', $this->categorie);
    $login->execute();
    return;
  }
}
?>
