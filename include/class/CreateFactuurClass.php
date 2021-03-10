<?php
/**
 *
 */
class CreateFactuurClass
{
  public $user;
  public $cart;
  private $dbClass;
  public $factuur_id;


  function __construct($user,$cart)
  {
      $this->user = $user;
      $this->cart = $cart;
      $this->dbClass = new DBClass();

  }
  public function Factuur(){
    $pdo = $this->dbClass->makeConnection();
    $createfacatuur = $pdo->prepare("INSERT INTO `factuur` (`factuur_nr`, `user_id`, `factuur_datum`) VALUES (NULL, :user, current_timestamp());");
    $createfacatuur->bindParam(':user', $this->user);
    $createfacatuur->execute();
    $getfactuur_id = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getfactuur_id->execute();
    $factuur_id = $getfactuur_id->fetch();
    $this->factuur_id = $factuur_id['0'];
    foreach ($this->cart as $product) {
      $createfacatuur_product = $pdo->prepare("INSERT INTO `product_factuur` (`factuur_nr`, `product_nr`, `product_aantal`) VALUES (:facuurt, :product, :aantal);");
      $createfacatuur_product->bindParam(':facuurt', $this->factuur_id);
      $createfacatuur_product->bindParam(':product', $product['Product']);
      $createfacatuur_product->bindParam(':aantal', $product['Aantal']);
      $createfacatuur_product->execute();
    }
    unset($_SESSION['cart']);
    return;
  }
}
