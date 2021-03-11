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
    $product = $pdo->prepare("insert into product (naam, img, prijs, btw, categorie) value (:naam, :img, :prijs, :btw, :categorie)");
    $product->bindParam(':naam', $this->naam);
    $product->bindParam(':img', $this->img);
    $product->bindParam(':prijs', $this->prijs);
    $product->bindParam(':btw', $this->btw);
    $product->bindParam(':categorie', $this->categorie);
    $product->execute();
    return;
  }

  public function WorkshopInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $workshop = $pdo->prepare("insert into taal_workshop (naam, img, prijs, btw, categorie) value (:naam, :img, :prijs, :btw, :categorie)");
    $workshop->bindParam(':naam', $this->naam);
    $workshop->bindParam(':img', $this->img);
    $workshop->bindParam(':prijs', $this->prijs);
    $workshop->bindParam(':btw', $this->btw);
    $workshop->bindParam(':categorie', $this->categorie);
    $workshop->execute();
    return;
  }
}
?>
