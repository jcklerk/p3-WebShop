<?php
/**
 *
 */
class ShopClass
{
 public $cat;
 private $dbClass;

  function __construct($cat)
  {
    $this->cat = $cat;
      $this->dbClass = new DBClass();
  }
  public function GetProductCat(){
      $pdo = $this->dbClass->makeConnection();
      $getproducts = $pdo->prepare("SELECT * FROM `product` WHERE `categorie` = :cat ");
      $getproducts->bindParam(':cat', $this->cat);
      $getproducts->execute();
      $allproduct = $getproducts->fetchAll();
      foreach ($allproduct as $x) { ?>
          <div class="col">
              <div class="card h-100 bc-gray-black ">
                  <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $x['naam']; ?> </h5>
                      <p class="card-text"><?php echo $x['categorie']; ?></p>
                      <p class="card-text">€<?php echo $x['prijs']; ?></p>
                  </div>
              </div>
          </div>
      <?php }
  }
}
