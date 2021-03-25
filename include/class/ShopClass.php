<?php
/**
 *
 */
class ShopClass
{
 public $cat;
 private $dbClass;
 public $url;

  function __construct($cat, $url)
  {
    $this->cat = $cat;
      $this->dbClass = new DBClass();
      $this->url = $url;
  }
  public function GetProductCat(){
      $pdo = $this->dbClass->makeConnection();
      $getproducts = $pdo->prepare("SELECT * FROM `product`INNER JOIN `taal_product` ON product.product_nr = taal_product.product_nr WHERE  `taal_id` = :taal_id AND product.categorie = :cat ");
      $getproducts->bindParam(':cat', $this->cat);
      $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
      $getproducts->execute();
      $catproduct = $getproducts->fetchAll();
      $arraylang = (new LangClass())->LangGetCart();

      if (empty($catproduct)) {
        echo "<h1>Deze categorie is leeg</h1>";
      }
      foreach ($catproduct as $x) { ?>
              <a style="text-decoration: none;" href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card h-100 bc-gray-black ">
                         <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                         <div class="card-body">
                             <h5 class="card-title c-red"><?php echo $x['naam'];?> </h5>
                             <p class="card-text c-red"><?php echo $x['categorie'];?></p>
                             <p class="card-text c-red">€<?php echo $x['prijs'];?></p>
                         </div>
                     </div>
                 </div>
              </a>
      <?php }
  }
  public function GetProductall(){
      $pdo = $this->dbClass->makeConnection();
      $getproducts = $pdo->prepare("SELECT * FROM `product`INNER JOIN `taal_product` ON product.product_nr = taal_product.product_nr WHERE  `taal_id` = :taal_id");
      $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
      $getproducts->execute();
      $allproduct = $getproducts->fetchAll();
      foreach ($allproduct as $x) { ?>
              <a href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card h-100 bc-gray-black ">
                         <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                         <div class="card-body">
                         <h5 class="card-title"><?php echo $x['naam'];?> </h5>
                         <p class="card-text"><?php echo $x['categorie'];?></p>
                         <p class="card-text">€<?php echo $x['prijs'];?></p>
                    </div>
                 </div>
                 </div>
              </a>
      <?php }
  }
}
