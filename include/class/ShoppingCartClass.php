<?php
//we halen de array met prodcuten van onze cart binnen en laten deze zien on de schoppincart.

class ShoppingCartClass
{
  private $dbClass;
  public $cart;
  public $total;

  function __construct($cart, $total){// haal de array binnen van het andere document.
    $this->dbClass = new DBClass();
    $this->cart = $cart;
    $this->total = $total;
  }
  public function Cart(){// loop door de array en laat de producten zien.
      if (!empty($this->cart)){
          $pdo = $this->dbClass->makeConnection();




          foreach ($this->cart as $array) {
              $getProducts = $pdo->prepare("SELECT * FROM `product` INNER JOIN `taal_product` ON product.product_nr = taal_product.product_nr WHERE product.product_nr= :product AND `taal_id` = :taal_id");
              $getProducts->bindParam(':product', $array['Product']);
              $getProducts->bindParam(':taal_id', $_SESSION['lang_id']);
              $getProducts->execute();
              $products = $getProducts->fetch();

              ?>
              <li class="list-group-item">
              <div class="card mb-3" style="max-width: 70%;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img  height="250" width="100%" style="object-fit: cover;" src="<?php echo $products['img'];?>" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $products["naam"];?></h5>
                      <p class="card-text">
                        <form method="post">
                          <input type="number" name="product" value="<?php echo $array['Product'];?>" hidden>
                          <select onchange="this.form.submit()" name="aantal">
                            <option><?php echo $array['Aantal'];?></option>
                            <?php
                            for ($i=1; $i <= 225 ; $i++) {
                              echo '<option value="'. $i .'">'. $i .'</option>';
                            }
                             ?>
                          </select>
                        </form>
                        <p class="fs-4">€<?php echo $products['prijs'] * $array['Aantal'] ?> </p>
                        <?php $prijs = $products['prijs'] * $array['Aantal'];
                        array_push($this->total, $prijs);?>
                        <br>
                        <form method="post">
                          <input type="number" name="product" value="<?php echo $array['Product'];?>" hidden>
                          <button type="submit" name="delete" class="btn btn-danger" value="999">Delete</button>
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
    <?php
          }
      }
    return $this->total;
  }
}
