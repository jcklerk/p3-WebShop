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
            <div class="col">
                <div class="card h-100 bc-gray-black">
                    <img src="<?php echo $x['img']?>" class="card-img-top mx-auto" alt="..." style="height: 80%; width: 80%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $x['naam']; ?> </h5>
                        <p class="card-text"><?php echo $x['categorie']; ?></p>
                        <p class="card-text">€<?php echo $x['prijs']; ?></p>
                        <p class="card-text"><form method="post"><button name="product_nr" value="<?php echo $x['product_nr'];?>">betalen</button></form></p>
                    </div>
                </div>
            </div>
        <?php }
            if (isset($_POST['product_nr'])){
                if (isset($_SESSION['cart'][$_POST['product_nr']])){
                    $a = $_SESSION['cart'][$_POST['product_nr']]['Aantal'];
                    $b = $a +1;
                    $_SESSION['cart'] = array_replace($_SESSION['cart'][$_POST['product_nr']]['Aantal'] = $b);

                }else{
                $_SESSION['cart'][$_POST['product_nr']]['Product'] = $_POST['product_nr'];
                $_SESSION['cart'][$_POST['product_nr']]['Aantal'] = 1;
            }
        }
    }
}
