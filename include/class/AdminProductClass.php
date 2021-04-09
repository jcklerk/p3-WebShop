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



  function __construct()
  {
    $this->dbClass = new DBClass();
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
    $product_lang = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, naam.taal_id FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = beschrijving.taal_id AND product.product_nr= :product_nr");
    $product_lang->bindParam(':product_nr', $product_nr);
    $product_lang->execute();
    $array_product_lang = $product_lang->fetchAll();
    $product_data = array('main' => $array_product, 'lang' => $array_product_lang,);
    return $product_data;
    } else {
      echo "geen product geselecteerd!";
    }
  }

  public function ProductInsert($img, $prijs, $btw, $categorie, $lang_post)
  {
    $pdo = $this->dbClass->makeConnection();
    $product = $pdo->prepare("INSERT INTO product (img, prijs, btw, categorie) VALUE (:img, :prijs, :btw, :categorie)");
    $product->bindParam(':img', $img);
    $product->bindParam(':prijs', $prijs);
    $product->bindParam(':btw', $btw);
    $product->bindParam(':categorie', $categorie);
    $product->execute();
    $getproduct_nr = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getproduct_nr->execute();
    $product_nr = $getproduct_nr->fetch();
    $product_nr = $product_nr['0'];
    foreach ($lang_post as $lang_post_array) {
      $taal = $pdo->prepare("INSERT INTO `taal_tekst` (`tekst_id`, `tekst_nr`, `section`, `taal_id`, `tekst`) VALUES ('naam', :product_nr, 'product', :taal_id, :naam), ('beschrijving', :product_nr, 'product', :taal_id, :beschrijving);");
      $taal->bindParam(':product_nr', $product_nr);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':naam', $lang_post_array['naam']);
      $taal->bindParam(':beschrijving', $lang_post_array['beschrijving']);
      $taal->execute();
    }
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'products.php'.'";</script>';
  }

  public function ProductUpdate($img, $prijs, $btw, $categorie, $lang_post)
  {
    if (!empty($_GET['product'])) {
    $pdo = $this->dbClass->makeConnection();
    $product_nr = $_GET['product'];
    $product = $pdo->prepare("UPDATE `product` SET `img` =  :img, `prijs` =  :prijs, `btw` =  :btw, `categorie` =  :categorie WHERE `product`.`product_nr` = :product_nr ;");
    $product->bindParam(':img', $img);
    $product->bindParam(':prijs', $prijs);
    $product->bindParam(':btw', $btw);
    $product->bindParam(':categorie', $categorie);
    $product->bindParam(':product_nr', $product_nr);
    $product->execute();
    $product_nr = $product_nr['0'];
    foreach ($lang_post as $lang_post_array) {
      $taal = $pdo->prepare("UPDATE `taal_tekst` SET `tekst` = :naam WHERE `taal_tekst`.`tekst_id` = 'naam' AND `taal_tekst`.`tekst_nr` = :product_nr AND `taal_tekst`.`section` = 'product' AND `taal_tekst`.`taal_id` = :taal_id; UPDATE `taal_tekst` SET `tekst` = :beschrijving WHERE `taal_tekst`.`tekst_id` = 'beschrijving' AND `taal_tekst`.`tekst_nr` = :product_nr AND `taal_tekst`.`section` = 'product' AND `taal_tekst`.`taal_id` = :taal_id;");
      $taal->bindParam(':product_nr', $product_nr);
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

  public function GetAllProducts()
  {
    $pdo = $this->dbClass->makeConnection();
    $getproducts = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, product.img, product.prijs, product.btw, product.categorie FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = beschrijving.taal_id AND naam.taal_id = :taal_id AND beschrijving.taal_id = :taal_id");
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
      $rmproducts_lang = $pdo->prepare("DELETE FROM `taal_tekst` WHERE `taal_tekst`.`tekst_id` = 'naam' AND `taal_tekst`.`tekst_nr` = :product_id AND `taal_tekst`.`section` = 'product'; DELETE FROM `taal_tekst` WHERE `taal_tekst`.`tekst_id` = 'beschrijving' AND `taal_tekst`.`tekst_nr` = :product_id AND `taal_tekst`.`section` = 'product';");
      $rmproducts_lang->bindParam(':product_id', $_GET['product']);
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
