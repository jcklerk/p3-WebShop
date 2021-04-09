<?php
require __DIR__ ."/include/nav.php";
require "include/class/WorkShopClass.php";
$arrayworkshop = (new WorkShopClass($url))->GetWorkShop($_GET['workshops'], $_SESSION['lang_id']);
if (empty($arrayworkshop)) {
 echo '<script type="text/javascript"> window.location.href = "'. $url .'workshop.php";</script>';
 exit();
}
$arrayworkshop
?>
<title>WorkShop - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">
<div class="parallax-halfheight d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(255, 255, 255, 0.45), rgba(0, 0, 0, 0.45)), url(<?php echo $arrayworkshop['workshop_img']; ?>);">

    <div class="text-center">
        <h1 class="fos-2 op ts-1"><?php echo $arrayworkshop['workshop_title']; ?></h1>

    </div>
</div>

<div class="c-white" style="margin: 20px;">
  <div class="row" style="--bs-gutter-x: 0 rem !important;">
    <div class="col-sm">
      <h2>Ingredients:</h2>
      <h4><?php echo $arrayworkshop['ingredienten']?></h4>
       <br>
      <h2>what u need:</h2>
      <h4><?php echo $arrayworkshop['benodigdheden']?></h4>
   </div>
   <div class="col-sm">
     <iframe style="float: right" width="560" height="315" src="<?php echo $arrayworkshop['video'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
   </div>
   <div class="row" style="--bs-gutter-x: 0 rem !important;">
    <div class="col-sm">

   <h2> How to make <?php echo $arrayworkshop['workshop_title']; ?>:</h2>
   <h4> <?php echo $arrayworkshop['maken']?></h4>
 </div><div class="col-sm mt-1">
    <img src="<?php echo $arrayworkshop['img'];?>"  style="float: right" width="auto" height="315">
  </div>
</div>
</div>
    </body>
<?php
require "include/footer.php";
?>
