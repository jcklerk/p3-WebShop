<?php
/**
 *
 */
class AdminProductClass
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
    $product = $pdo->prepare("INSERT INTO product (naam, img, prijs, btw, categorie) VALUE (:naam, :img, :prijs, :btw, :categorie)");
    $product->bindParam(':naam', $this->naam);
    $product->bindParam(':img', $this->img);
    $product->bindParam(':prijs', $this->prijs);
    $product->bindParam(':btw', $this->btw);
    $product->bindParam(':categorie', $this->categorie);
    $product->execute();
    return;
  }


}
?>
