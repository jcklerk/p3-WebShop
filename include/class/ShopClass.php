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
      $getproducts = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, product.img, product.prijs, product.btw, product.categorie FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = :taal_id AND beschrijving.taal_id = :taal_id AND product.categorie = :cat ");
      $getproducts->bindParam(':cat', $this->cat);
      $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
      $getproducts->execute();
      $catproduct = $getproducts->fetchAll();

      if (empty($catproduct)) {
        echo  '<h1>'.$GLOBALS['arraytekst']["cat_leeg"].'</h1>';
      }
      foreach ($catproduct as $x) { ?>
              <a style="text-decoration: none;" href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card bc-gray-black ">
                         <img height="250" width="100%" style="object-fit: cover;" src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                         <div class="card-body" style="height: 150px!important">
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
      $getproducts = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, product.img, product.prijs, product.btw, product.categorie FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = :taal_id AND beschrijving.taal_id = :taal_id");
      $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
      $getproducts->execute();
      $allproduct = $getproducts->fetchAll();
      foreach ($allproduct as $x) { ?>
              <a style="text-decoration: none;" href="<?php echo $this->url;?>webshopproduct.php/?product_nr=<?php echo $x['product_nr']?>">
                 <div class="col">
                     <div class="card bc-gray-black ">
                         <img height="250" width="100%" style="object-fit: cover;" src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                        <div class="card-body" style="height: 150px!important">
                         <h5 class="card-title c-red"><?php echo $x['naam'];?> </h5>
                         <p class="card-text c-red"><?php echo $x['beschrijving'];?></p>
                         <p class="card-text c-red">€<?php echo $x['prijs'];?></p>
                    </div>
                 </div>
                 </div>
              </a>
      <?php }
  }
}
