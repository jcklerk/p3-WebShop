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
    $getproduct_nr = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getproduct_nr->execute();
    $product_nr = $getproduct_nr->fetch();
    $this->product_nr = $product_nr['0'];
    foreach ($this->lang_post as $lang_post_array) {
      $taal = $pdo->prepare("INSERT INTO `taal_product` (`product_nr`, `taal_id`, `beschrijving`) VALUES (:product_nr, :taal_id, :beschrijving);");
      $taal->bindParam(':product_nr', $this->product_nr);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':beschrijving', $lang_post_array['beschrijving']);
      $taal->execute();
    }
  }




}
?>
