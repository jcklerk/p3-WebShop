<?php
require __DIR__ ."/include/nav.php";
 if (isset($_GET['workshops'])) {
  $_SESSION['workshops'] = $_GET['workshops'];
  echo '<script type="text/javascript"> window.location.href = "'. $url .'workshops.php";</script>';
  exit();
}
$getworkshop = $pdo->prepare("SELECT * FROM `workshop` WHERE `workshop_id` = :workshop_id");
$getworkshop->bindParam(':workshop_id', $_SESSION['workshops']);
$getworkshop->execute();
$arrayworkshop = $getworkshop->fetchAll();
if (empty($arrayworkshop['0'])) {
 echo '<script type="text/javascript"> window.location.href = "'. $url .'workshop.php";</script>';
 exit();
}
?>

<body class="bc-gray-black">
<div class="parallax-halfheight d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $arrayworkshop['0']['workshop_img']; ?>);">

    <div class="text-center">
        <h1 class="fos-2"><?php echo $arrayworkshop['0']['workshop_title']; ?></h1>

    </div>
</div>

<div class="c-white" style="margin: 8px;">
<h1>
    <iframe width="420" height="315" style="float: right;"
            src="https://www.youtube.com/watch?v=w-HvWl89GGA">
    </iframe>
    Ingredients:
   <br> human meat, Anime titties, Anime thighs, souls of the innocent, virgin sacrifice

    <br><br>
    what u need: <br> een pan, een koelkast, een fiets om stroom op te wekken, een palingworst

    <br><br>
    How to make blyat:
   <br>    Verwarm de oven voor tot 200 ºC. Verdeel over 4 royale vellen bakpapier of aluminiumfolie de tomaat en courgette. Leg er de schelvis op.
    Roer de currypasta door de kokosmelk en schenk over de vis. Vouw het bakpapier of de aluminiumfolie tot pakketjes dicht. Bind ze eventueel vast met een stukje keukentouw of zet ze vast met (metalen!) paperclips.
    Leg de pakketjes op een bakplaat en bak de vis in circa 20 minuten gaar in de voorverwarmde oven. Kook intussen de rijst volgens de aanwijzingen op de verpakking.
    Leg de pakketjes op 4 borden. Vouw ze aan tafel open en bestrooi met de basilicumblaadjes. Serveer er de rijst en partjes limoen bij.
    <img src="img/ja.jpg" style="float: right;">
</h1>
</div>
    </body>
<?php
require "include/footer.php";
?>
