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
              $getProducts = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, product.img, product.prijs, product.btw, product.categorie FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = :taal_id AND beschrijving.taal_id = :taal_id AND product.product_nr= :product");
              $getProducts->bindParam(':product', $array['Product']);
              $getProducts->bindParam(':taal_id', $_SESSION['lang_id']);
              $getProducts->execute();
              $products = $getProducts->fetch();

              ?>
              <li class="list-group-item">
              <div class="card mb-3">
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
