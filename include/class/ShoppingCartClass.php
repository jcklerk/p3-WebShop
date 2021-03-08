<?php
//we halen de array met prodcuten van onze cart binnen en laten deze zien on de schoppincart.

class ShoppingCartClass
{
  private $dbClass;
  public $cart;

  function __construct($cart){// haal de array binnen van het andere document.
    $this->dbClass = new DBClass();
    $this->cart = $cart;
  }
  public function Cart(){// loop door de array en laat de producten zien.
    $pdo = $this->dbClass->makeConnection();

    foreach ($this->cart as $productid) {
      echo '
      <li class="list-group-item">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">'. $productid .'</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
      </div>
      </li>';
  }
  return;

}
}
