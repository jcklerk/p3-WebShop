<?php


class ShoppingCartClass
{
private $dbClass;

function __construct(){
    $this->dbClass = new DBClass();
}

public function GetCartClass(){
    $pdo = $this->$dbclass->makeConection();
    $GetText = $pdo->prepare();
}
}