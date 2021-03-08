<?php
require __DIR__ ."/include/nav.php";
require "include/class/WorkShopClass.php";
 if (isset($_GET['workshops'])) {
  $_SESSION['workshops'] = $_GET['workshops'];
  echo '<script type="text/javascript"> window.location.href = "'. $url .'workshops.php";</script>';
  exit();
}
$arrayworkshop = (new WorkShopsClass($url, $_SESSION['workshops'], $_SESSION['lang_id']))->GetWorkShop();
if (empty($arrayworkshop)) {
 echo '<script type="text/javascript"> window.location.href = "'. $url .'workshop.php";</script>';
 exit();
}
?>

<body class="bc-gray-black">
<div class="parallax-halfheight d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $arrayworkshop['workshop_img']; ?>);">

    <div class="text-center">
        <h1 class="fos-2"><?php echo $arrayworkshop['workshop_title']; ?></h1>

    </div>
</div>

<div class="c-white" style="margin: 8px;">
  <div class="row">
    <div class="col-sm">
      <h1>Ingredients:</h1>
      <h3>human meat, Anime titties, Anime thighs, souls of the innocent, virgin sacrifice</h3>
       <br>
      <h1>what u need:</h1>
      <h3>een pan, een koelkast, een fiets om stroom op te wekken, een palingworst</h3>
   </div>
   <div class="col-sm">
     <iframe style="float: right" width="560" height="315" src="<?php echo $arrayworkshop['video'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
  </div>
  <div class="row">
    <div class="col-sm">

    <br><br>
    How to make blyat:
   <br>    Verwarm de oven voor tot 200 ºC. Verdeel over 4 royale vellen bakpapier of aluminiumfolie de tomaat en courgette. Leg er de schelvis op.
    Roer de currypasta door de kokosmelk en schenk over de vis. Vouw het bakpapier of de aluminiumfolie tot pakketjes dicht. Bind ze eventueel vast met een stukje keukentouw of zet ze vast met (metalen!) paperclips.
    Leg de pakketjes op een bakplaat en bak de vis in circa 20 minuten gaar in de voorverwarmde oven. Kook intussen de rijst volgens de aanwijzingen op de verpakking.
    Leg de pakketjes op 4 borden. Vouw ze aan tafel open en bestrooi met de basilicumblaadjes. Serveer er de rijst en partjes limoen bij.
    </div><div class="col-sm">
    <img src="<?php echo $arrayworkshop['img'];?>"  style="float: right" width="auto" height="315">
  </div>
</div>
</div>
    </body>
<?php
require "include/footer.php";
?>
