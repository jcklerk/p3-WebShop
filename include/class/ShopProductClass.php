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
        foreach ($allproduct as $x) { ?>
            <div class="col">
                <div class="card h-100 bc-gray-black ">
                    <img src="<?php echo $x['img']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $x['naam']; ?> </h5>
                        <p class="card-text"><?php echo $x['categorie']; ?></p>
                        <p class="card-text">€<?php echo $x['prijs']; ?></p>
                    </div>
                </div>
            </div>
        <?php }
    }
}