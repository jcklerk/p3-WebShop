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
        $getproducts = $pdo->prepare("SELECT * FROM `product` WHERE `product_nr` = :product_nr ");
        $getproducts->bindParam(':product_nr', $this->product);
        $getproducts->execute();
        $allproduct = $getproducts->fetchAll();
        var_dump($allproduct);
        foreach ($allproduct as $x) { ?>
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="<?php echo $x['img']?>"></div>
                <div class="p-2 bd-highlight c-red">
                    <h2><?php echo $x['naam']?></h2>
                    <br>
                    <p><?php echo $x['categorie']; ?></p>
                </div>
                <div class="ms-auto p-2 bd-highlight c-red" style="margin-right: 7%;">
                    <p>€<?php echo $x['prijs'];?></p>
                    <br>
                    <p class="card-text c-red">
                        <form method="post">
                            <button type="button" class="btn btn-primary btn-lg" name="product_nr" value="<?php echo $x['product_nr'];?>">
                                betalen
                            </button>
                        </form>
                    </p>
                </div>
            </div>
        <?php }
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
        }
    }
}
