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
  private $lang_post;
  private $product_nrl;



  function __construct($img, $prijs, $btw, $categorie, $lang_post)
  {
    $this->dbClass = new DBClass();
    $this->img = $img;
    $this->prijs = $prijs;
    $this->btw = $btw;
    $this->categorie = $categorie;
    $this->lang_post = $lang_post;
  }
  public function ProductData()
  {
    if (!empty($_GET['product'])) {
    $pdo = $this->dbClass->makeConnection();
    $product_nr = $_GET['product'];
    $product = $pdo->prepare("SELECT * FROM `product` WHERE `product_nr` = :product_nr");
    $product->bindParam(':product_nr', $product_nr);
    $product->execute();
    $array_product = $product->fetch();
    $product_lang = $pdo->prepare("SELECT * FROM `taal_product` WHERE `product_nr` = :product_nr");
    $product_lang->bindParam(':product_nr', $product_nr);
    $product_lang->execute();
    $array_product_lang = $product_lang->fetchAll();
    $product_data = array('main' => $array_product, 'lang' => $array_product_lang,);
    return $product_data;
    } else {
      echo "geen product geselecteerd!";
    }
  }

  public function ProductInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $product = $pdo->prepare("INSERT INTO product (img, prijs, btw, categorie) VALUE (:img, :prijs, :btw, :categorie)");
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
      $taal = $pdo->prepare("INSERT INTO `taal_product` (`product_nr`, `taal_id`, `naam` , `beschrijving`) VALUES (:product_nr, :taal_id, :naam, :beschrijving);");
      $taal->bindParam(':product_nr', $this->product_nr);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':naam', $lang_post_array['naam']);
      $taal->bindParam(':beschrijving', $lang_post_array['beschrijving']);
      $taal->execute();
    }
    header('loccation: ' . $_SESSION['url'].'admin/products.php');
  }

  public function ProductUpdate()
  {
    if (!empty($_GET['product'])) {
    $pdo = $this->dbClass->makeConnection();
    $product_nr = $_GET['product'];
    $product = $pdo->prepare("UPDATE `product` SET `img` =  :img, `prijs` =  :prijs, `btw` =  :btw, `categorie` =  :categorie WHERE `product`.`product_nr` = :product_nr ;");
    $product->bindParam(':img', $this->img);
    $product->bindParam(':prijs', $this->prijs);
    $product->bindParam(':btw', $this->btw);
    $product->bindParam(':categorie', $this->categorie);
    $product->bindParam(':product_nr', $this->product_nr);
    $product->execute();
    $this->product_nr = $product_nr['0'];
    foreach ($this->lang_post as $lang_post_array) {
      $taal = $pdo->prepare("UPDATE `taal_product` SET  `naam` =:naam, `beschrijving` = :beschrijving WHERE `taal_product`.`product_nr` = :product_nr AND `taal_product`.`taal_id` = :taal_id ;");
      $taal->bindParam(':product_nr', $this->product_nr);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':naam', $lang_post_array['naam']);
      $taal->bindParam(':beschrijving', $lang_post_array['beschrijving']);
      $taal->execute();
    }
    // header reload werkt niet
  } else {
    echo "geen product geselecteerd!";
  }
  }
}
?>
