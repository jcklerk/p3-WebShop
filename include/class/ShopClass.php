<?php
/**
 *
 */
class ShopClass
{

  function __construct(argument)
  {
    // code...
  }
}

//$getproducts = $pdo->prepare("SELECT * FROM `products`");
//$getproducts->execute();
//$allproduct = $getproducts->fetchAll();


<?php
foreach ($allproduct as $x) { ?>
        <div class="col">
    <div class="card h-100 bc-gray-black ">
<img src="img/<?php echo $x['1']?>" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title"><?php echo $x['2']; ?> </h5>
<p class="card-text"><?php echo $x['3']; ?></p>
<p class="card-text">€<?php echo $x['4']; ?></p>
</div>
    </div>
        </div>
<?php }
?>
