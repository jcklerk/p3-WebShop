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

      $getemtycat = $pdo->prepare('SELECT * FROM `taal_shop` WHERE taal_id = :taal_id');
      $getemtycat->bindParam(':taal_id', $_SESSION['lang_id']);
      $getemtycat->execute();
      $getemtycat = $getemtycat->fetch();
      if (empty($catproduct)) {
        echo  '<h1>'.$getemtycat["cat_leeg"].'</h1>';
      }
      foreach ($catproduct as $x) { ?>
              <a style="text-decoration: none;" href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card h-100 bc-gray-black ">
                         <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                         <div class="card-body" style="height: 50px!important">
                             <h5 class="card-title c-red"><?php echo $x['naam'];?> </h5>
                             <p class="card-text c-red"><?php echo $x['beschrijving'];?></p>
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
              <a style="text-decoration: none;" href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card bc-gray-black ">
                         <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                        <div class="card-body" style="height: 150px!important">
                         <h5 class="card-title c-red"><?php echo $x['naam'];?> </h5>
                         <p class="card-text c-red"><?php echo $x['categorie'];?></p>
                         <p class="card-text c-red">€<?php echo $x['prijs'];?></p>
                    </div>
                 </div>
                 </div>
              </a>
      <?php }
  }
}
