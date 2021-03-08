<?php
// in productie de DBClass gebruiken PLZ
//require __DIR__ . '/DBClass.php';
// Met git deze gebruiken in plaats van hier boven PLZ
require __DIR__ . '/../webshop_config.php';
/**
 *
 */
class LangClass
{
  private $dbClass;
  private $pdo;
  // maak niuewe database connection op dbClass
   function __construct()
  {
    $this->dbClass = new DBClass();
  }
  // get vertaling functie
  public function LangGetAll(){
    $pdo = $this->dbClass->makeConnection();
    $getlang = $pdo->prepare("SELECT * FROM `talen`");
    $getlang->execute();
    $arraylang = $getlang->fetchAll();
    return $arraylang;
  }
  public function LangGetNav(){
    $pdo = $this->dbClass->makeConnection();
    $getnav = $pdo->prepare("SELECT * FROM `taal_nav` WHERE `taal_id` = :taal_id");
    $getnav->bindParam(':taal_id', $_SESSION['lang_id']);
    $getnav->execute();
    $arraynav = $getnav->fetch();
    return $arraynav;
  }
  public function LangGetHome(){
    $pdo = $this->dbClass->makeConnection();
    $gethome = $pdo->prepare("SELECT * FROM `taal_home` WHERE `taal_id` = :taal_id");
    $gethome->bindParam(':taal_id', $_SESSION['lang_id']);
    $gethome->execute();
    $arrayhome = $gethome->fetch();
    return $arrayhome;
  }
    public function LangGetCart()
    {
        $pdo = $this->dbClass->makeConnection();
        $getcart = $pdo->prepare("SELECT * FROM `taal_shoppingcart` WHERE `taal_id` = :taal_id");
        $getcart->bindParam(':taal_id', $_SESSION['lang_id']);
        $getcart->execute();
        $arraycart = $getcart->fetch();
        return $arraycart;
    }
}
