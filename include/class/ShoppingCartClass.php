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
      if (!empty($this->cart)){
          $pdo = $this->dbClass->makeConnection();




          foreach ($this->cart as $array) {
              $getProducts = $pdo->prepare("SELECT * FROM `product` WHERE `product_nr` = :product");
              $getProducts->bindParam(':product', $array['Product']);
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
                            for ($i=1; $i <= 10 ; $i++) {
                              echo '<option value="'. $i .'">'. $i .'</option>';
                            }
                             ?>
                          </select>
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
    <?php
          }
      } else  {
          echo 'array is leeg';
      }
    return;
  }
}
