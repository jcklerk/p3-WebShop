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
        $getproducts = $pdo->prepare("SELECT * FROM `product`INNER JOIN `taal_product` ON product.product_nr = taal_product.product_nr WHERE product.product_nr = :product_nr AND `taal_id` = :taal_id ");
        $getproducts->bindParam(':product_nr', $this->product);
        $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
        $getproducts->execute();
        $allproducts = $getproducts->fetchAll();

        foreach ($allproducts as $x) { ?>
                      <div class="card mb-3" style="margin-top: 4em; z-index: 1;">
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
                                    betalen
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
            if (isset($_POST['product_nr'])){
                ?>
                <div class="toast show top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 2!important;">
                    <div class="toast-header">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Bootstrap</strong>
                    </div>
                    <div class="toast-body">
                        Hello, world! This is a toast message.
                    </div>
                </div>
                <script rel="script">
                    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
                    var toastList = toastElList.map(function (toastEl) {
                        return new bootstrap.Toast(toastEl, option)
                    })
                </script>
                <?php
                if (isset($_SESSION['cart'][$_POST['product_nr']])){
                    $a = $_SESSION['cart'][$_POST['product_nr']]['Aantal'];
                    $b = $a +1;
                    $c = array($_POST['product_nr']=>array("Product"=>$_POST['product_nr'],"Aantal"=>$b));
                    $_SESSION['cart'] = array_replace($_SESSION['cart'],$c);

                }else{
                $_SESSION['cart'][$_POST['product_nr']]['Product'] = $_POST['product_nr'];
                $_SESSION['cart'][$_POST['product_nr']]['Aantal'] = 1;
            }
        }
    }
}
