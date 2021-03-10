<?php
/**
 *
 */
class CreateFactuur
{
  public $user;
  private $cart;
  private $dbClass;
  private $factuur_id;


  function __construct($user,$cart)
  {
      $this->user = $user;
      $this->cart = $cart;
      $this->dbClass = new DBClass();

  }
  private function Factuur(){
    $pdo = $this->dbClass->makeConnection();
    $createfacatuur = $pdo->prepare("INSERT INTO `factuur` (`factuur_nr`, `user_id`, `factuur_datum`) VALUES (NULL, :user, current_timestamp()); SELECT LAST_INSERT_ID();");
    $createfacatuur->bindParam(':user', $this->user);
    $createfacatuur->execute();
    echo $createfacatuur->fetch();
  }


 ?>
