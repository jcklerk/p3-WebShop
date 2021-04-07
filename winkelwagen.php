<?php
    require 'include/nav.php';
    $_SESSION['verzendkosten'] = '';
    $total = array();
    if (empty($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }
    if (!empty($_POST['product'])) {
      foreach ($_SESSION['cart'] as $cart) {
        if($_POST['product'] == $cart['Product']){
          if (!empty($_POST['aantal'])) {
            $aanpassen=array($_POST['product']=>array("Product"=>$_POST['product'],"Aantal"=>$_POST['aantal']));
            $_SESSION['cart'] = array_replace($_SESSION['cart'], $aanpassen);
          }elseif (!empty($_POST['delete'])) {
            unset($_SESSION['cart'][$_POST['product']]);
          }
        }
      }
    }
    //print_r($_SESSION['cart']);
    require 'include/class/ShoppingCartClass.php';
?>
<title>Winkelwagen - Wok & Roll</title>
<style media="screen">
  body{
    width: 100%;
    height: 100%
  }
</style>
<body class="d-flex flex-column h-100">


<link rel="stylesheet" href="css/winkelwagen.css">
<div class="card list-width">
    <div class="card-header">
        <?php
            echo $arraytekst['shoppingcart'];
        ?>
    </div>
    <ul class="list-group list-group-flush">
      <?php $totaal = (new ShoppingCartClass($_SESSION['cart'],$total))->Cart();
      if (empty($_SESSION['cart'])) {
        echo $arraytekst['leeg_msg'];
      }
      ?>
    </ul>
    <div class="card-footer">
      <?php if (!empty($_SESSION['cart'])): ?>
        <?php if (array_sum($totaal) >= 50) {
            echo 'prijs: € ', array_sum($totaal), '<br> verzendkosten: gratis', '<br> totaal: € ', array_sum($totaal); $_SESSION['verzendkosten'] = '0.00';} else {echo '<br> prijs: € ', array_sum($totaal), '<br> verzendkosten: € 13,50', '<br> totaal: € ', array_sum($totaal) + 13.5; $_SESSION['verzendkosten'] = '13.50';
            }
            ?>
            <br>
      <a class="btn btn-primary" href="<?php echo $url;?>pay.php">
        <?php  echo $arraytekst['checkout'];?>
      </a>
    <?php ;else: ?>
      <br>
    <?php endif; ?>

    </div>
</div>
</body>
<?php
require 'include/footer.php';
