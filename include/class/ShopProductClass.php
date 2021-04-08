<?php


class ShopProductClass
{
    public $product;
    private $dbClass;

    function __construct($product)
    {
        $this->product = $product;
        $this->dbClass = new DBClass();
    }
    public function Product(){
        $pdo = $this->dbClass->makeConnection();
        $getproducts = $pdo->prepare("SELECT product.product_nr, naam.tekst AS naam, beschrijving.tekst AS beschrijving, product.img, product.prijs, product.btw, product.categorie FROM product JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr JOIN taal_tekst AS beschrijving on product.product_nr = beschrijving.tekst_nr WHERE product.product_nr = :product_nr AND naam.tekst_id LIKE 'naam' AND beschrijving.tekst_id LIKE 'beschrijving' AND naam.taal_id = :taal_id AND beschrijving.taal_id = :taal_id");
        $getproducts->bindParam(':product_nr', $this->product);
        $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
        $getproducts->execute();
        $x = $getproducts->fetch();
 ?>
                      <div class="card mb-3" style="margin-top: 1em ; z-index: 1;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img class="img-fluid" src="<?php echo $x['img']?>" alt="..." width="100%">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="card-title c-red" style="text-decoration:none;"><?php echo $x['naam']?></h3>
                            <p class="card-text c-red"><?php echo $x['beschrijving'] ?></p>
                            <p class="card-text c-red">€<?php echo $x['prijs'];?></p>
                            <p class="card-text c-red">
                            <form method="post">
                                <button type="submit" class="btn btn-primary btn-lg" name="product_nr" value="<?php echo $x['product_nr'];?>">
                                    <?php echo $GLOBALS['arraytekst']['pay']?>
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            if (isset($_POST['product_nr'])){
                if (isset($_SESSION['cart'][$_POST['product_nr']])){
                    $a = $_SESSION['cart'][$_POST['product_nr']]['Aantal'];
                    $b = $a +1;
                    $c = array($_POST['product_nr']=>array("Product"=>$_POST['product_nr'],"Aantal"=>$b));
                    $_SESSION['cart'] = array_replace($_SESSION['cart'],$c);

                }else{
                $_SESSION['cart'][$_POST['product_nr']]['Product'] = $_POST['product_nr'];
                $_SESSION['cart'][$_POST['product_nr']]['Aantal'] = 1;
            }
                    ?> <div class="alert alert-success" role="alert">
                        <p><?php echo $GLOBALS['arraytekst']['add_to_cart_melding'].' '.$_SESSION['cart'][$_POST['product_nr']]['Aantal']?></p>
                    </div>
                <?php
            }
        }
    }
