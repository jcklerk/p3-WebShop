<?php

class FactuurClass {
    public $user;
    private $dbClass;


    function __construct($user)
    {
        $this->user = $user;
        $this->dbClass = new DBClass();

    }
    public function GetFacatuur(){
        $pdo = $this->dbClass->makeConnection();
        $getproductfacatuur = $pdo->prepare("SELECT * FROM factuur JOIN product_factuur ON product_factuur.factuur_nr=factuur.factuur_nr LEFT JOIN product ON product.product_nr = product_factuur.product_nr LEFT JOIN taal_product ON product.product_nr = taal_product.product_nr WHERE `user_id` = :user AND `taal_id` = :taal_id");
        $getproductfacatuur->bindParam(':user', $this->user);
        $getproductfacatuur->bindParam(':taal_id', $_SESSION['lang_id']);
        $getproductfacatuur->execute();
        $productfactuur = $getproductfacatuur->fetchAll();

        foreach ($productfactuur as $x) {
            $totaal = $x['prijs'] * $x['product_aantal']
            ?>
            <tr>
                <th scope="row"><?php echo $x['factuur_nr']; ?></th>
                <td><?php echo $x['naam']; ?></td>
                <td><?php echo $x['factuur_datum']; ?></td>
                <td><?php echo $x['product_aantal']; ?></td>
                <td>€<?php echo $totaal; ?></td>
            </tr>
        <?php }
    }
    public function GetAllFacatuur(){
        $pdo = $this->dbClass->makeConnection();
        $getproductfacatuur = $pdo->prepare("SELECT * FROM factuur JOIN product_factuur ON product_factuur.factuur_nr=factuur.factuur_nr LEFT JOIN product ON product.product_nr = product_factuur.product_nr LEFT JOIN taal_product ON product.product_nr = taal_product.product_nr WHERE `taal_id` = :taal_id ORDER BY `product_factuur`.`factuur_nr` DESC");
        $getproductfacatuur->bindParam(':taal_id', $_SESSION['lang_id']);
        $getproductfacatuur->execute();
        $productfactuur = $getproductfacatuur->fetchAll();

        foreach ($productfactuur as $x) {
            $totaal = $x['prijs'] * $x['product_aantal']
            ?>
            <tr>
                <th scope="row"><?php echo $x['factuur_nr']; ?></th>
                <td><?php echo $x['user_id']; ?></td>
                <td><?php echo $x['naam']; ?></td>
                <td><?php echo $x['factuur_datum']; ?></td>
                <td><?php echo $x['product_aantal']; ?></td>
                <td>€<?php echo $totaal; ?></td>
            </tr>
        <?php }
    }
}
