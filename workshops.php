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
    Ingredients:
   <br> human meat, Anime titties, Anime thighs, souls of the innocent, virgin sacrifice

    <br><br>
    what u need: <br> een pan
    <br><br>
    How to make blyat:
   <br>cooking it ofc dumbass
</h1>
</div>
    </body>
<?php
require "include/footer.php";
?>
