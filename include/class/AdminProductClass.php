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
    $this->prijs = str_replace(',', '.', $prijs);
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
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'products.php'.'";</script>';
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
    $product->bindParam(':product_nr', $product_nr);
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
    unset($_POST);
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'editproducts.php?product='.$product_nr.'";</script>';
  } else {
    echo "geen product geselecteerd!";
  }
  }
}

class AdminProductsClass
{
  private $dbClass;
  private $pdo;

  function __construct()
  {
    $this->dbClass = new DBClass();
  }
  public function GetAllProducts()
  {
    $pdo = $this->dbClass->makeConnection();
    $getproducts = $pdo->prepare("SELECT * FROM `product`INNER JOIN `taal_product` ON product.product_nr = taal_product.product_nr WHERE  `taal_id` = :taal_id");
    $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
    $getproducts->execute();
    $allproduct = $getproducts->fetchAll();
    return $allproduct;
  }
  public function RemoveProducts()
  {
    if (isset($_GET['product'])) {
      $pdo = $this->dbClass->makeConnection();
      $rmproducts = $pdo->prepare("DELETE FROM `product` WHERE `product`.`product_nr` = :product_id");
      $rmproducts->bindParam(':product_id', $_GET['product']);
      $rmproducts->execute();
      $rmproducts_lang = $pdo->prepare("DELETE FROM `taal_product` WHERE `taal_product`.`product_nr` = :product_id");
      $rmproducts_lang->bindParam(':product_id', $_GET['product']);
      $rmproducts_lang->execute();
      echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'products.php'.'";</script>';
    } else{
      echo "geen product geselecteerd!";
      echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'products.php'.'";</script>';
    }
  }
}
?>
