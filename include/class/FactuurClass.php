<?php

class FactuurClass {
  public $user;
  public $cart;
  private $dbClass;
  public $factuur_id;
  public $verzendkosten;


    function __construct()
    {
        $this->dbClass = new DBClass();

    }
    public function GetFacatuur($user){
        $pdo = $this->dbClass->makeConnection();
        $getproductfacatuur = $pdo->prepare("SELECT *, naam.tekst AS naam FROM factuur JOIN product_factuur ON product_factuur.factuur_nr=factuur.factuur_nr LEFT JOIN product ON product.product_nr = product_factuur.product_nr JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr WHERE `user_id` = :user AND naam.tekst_id LIKE 'naam' AND `naam`.`taal_id` = :taal_id;");
        $getproductfacatuur->bindParam(':user', $user);
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
                <td>€<?php echo str_replace('.',',', $x['verzend_kosten']); ?></td>
            </tr>
        <?php }
    }
    public function GetAllFacatuur(){
        $pdo = $this->dbClass->makeConnection();
        $getproductfacatuur = $pdo->prepare("SELECT *, naam.tekst AS naam FROM factuur JOIN product_factuur ON product_factuur.factuur_nr=factuur.factuur_nr LEFT JOIN product ON product.product_nr = product_factuur.product_nr JOIN taal_tekst AS naam on product.product_nr = naam.tekst_nr WHERE naam.tekst_id LIKE 'naam' AND `naam`.`taal_id` = :taal_id; ORDER BY `product_factuur`.`factuur_nr` DESC");
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
                <td>€<?php echo str_replace('.',',', $x['verzend_kosten']); ?></td>
            </tr>
        <?php }
    }
    public function Factuur($user,$cart,$verzendkosten){
      $pdo = $this->dbClass->makeConnection();
      $createfacatuur = $pdo->prepare("INSERT INTO `factuur` (`factuur_nr`, `user_id`, `verzend_kosten`, `factuur_datum`) VALUES (NULL, :user, :verzendkosten, current_timestamp());");
      $createfacatuur->bindParam(':user', $user);
      $createfacatuur->bindParam(':verzendkosten', $verzendkosten);
      $createfacatuur->execute();
      $getfactuur_id = $pdo->prepare("SELECT LAST_INSERT_ID();");
      $getfactuur_id->execute();
      $factuur_id = $getfactuur_id->fetch();
      $factuur_id = $factuur_id['0'];
      foreach ($cart as $product) {
        $createfacatuur_product = $pdo->prepare("INSERT INTO `product_factuur` (`factuur_nr`, `product_nr`, `product_aantal`) VALUES (:facuurt, :product, :aantal);");
        $createfacatuur_product->bindParam(':facuurt', $factuur_id);
        $createfacatuur_product->bindParam(':product', $product['Product']);
        $createfacatuur_product->bindParam(':aantal', $product['Aantal']);
        $createfacatuur_product->execute();
      }
      unset($_SESSION['cart']);
      return;
    }
}
