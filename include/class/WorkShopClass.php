<?php
// in productie de DBClass gebruiken PLZ
//require __DIR__ . '/DBClass.php';
// Met git deze gebruiken in plaats van hier boven PLZ
/**
 *
 */
class WorkShopClass
{
  private $dbClass;
  public $url;
  // maak niuewe database connection op dbClass
   function __construct($url)
  {
    $this->dbClass = new DBClass();
    $this->url = $url;
  }
  public function WorkShopGetAll(){
    $pdo = $this->dbClass->makeConnection();
    $getworkshop = $pdo->prepare("SELECT `workshop`.`workshop_id`, `workshop`.`workshop_img`, `workshop`.`video`, `workshop`.`img`, `title`.`tekst` AS workshop_title, `ingredienten`.`tekst` AS ingredienten, `benodigdheden`.`tekst` AS benodigdheden, `maken`.`tekst` AS maken FROM `workshop` JOIN `taal_tekst` AS `title` ON `workshop`.`workshop_id` = `title`.`tekst_nr` JOIN `taal_tekst` AS `ingredienten` ON `workshop`.`workshop_id` = `ingredienten`.`tekst_nr` JOIN taal_tekst AS benodigdheden ON workshop.workshop_id = benodigdheden.tekst_nr JOIN taal_tekst AS maken ON workshop.workshop_id = maken.tekst_nr WHERE title.taal_id = :taal_id AND title.tekst_id = 'title' AND `ingredienten`.`tekst_id` = 'ingredienten' AND benodigdheden.tekst_id = 'benodigdheden' AND maken.tekst_id = 'maken' AND ingredienten.taal_id = title.taal_id AND benodigdheden.taal_id = ingredienten.taal_id AND maken.taal_id = benodigdheden.taal_id  AND title.section = 'workshop' AND ingredienten.section = title.section AND benodigdheden.section = ingredienten.section AND benodigdheden.section = maken.section");
    $getworkshop->bindParam(':taal_id', $_SESSION['lang_id']);
    $getworkshop->execute();
    $arrayworkshop = $getworkshop->fetchAll();
    foreach ($arrayworkshop as $forworkshop){?>
      <div class="parallax-height35 d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(255, 255, 255, 0.45), rgba(0, 0, 0, 0.45)), url(<?php echo $forworkshop['workshop_img']; ?>);">
       <div onclick='window.location.href = "<?php echo $this->url."workshops.php/?workshops=".$forworkshop["workshop_id"];?>";' class="text-center">
           <h1 class="fos-2 op ts-1"><?php echo $forworkshop['workshop_title']; ?></h1>
         </div>
   </div>
   <div class=" bc-gray-black" style="height: 5px;"></div>
    <?php }
  }
  public function GetWorkShop($workshop_id, $taal_id){
    $pdo = $this->dbClass->makeConnection();
    $getworkshop = $pdo->prepare("SELECT `workshop`.`workshop_id`, `workshop`.`workshop_img`, `workshop`.`video`, `workshop`.`img`, `title`.`tekst` AS workshop_title, `ingredienten`.`tekst` AS ingredienten, `benodigdheden`.`tekst` AS benodigdheden, `maken`.`tekst` AS maken FROM `workshop` JOIN `taal_tekst` AS `title` ON `workshop`.`workshop_id` = `title`.`tekst_nr` JOIN `taal_tekst` AS `ingredienten` ON `workshop`.`workshop_id` = `ingredienten`.`tekst_nr` JOIN taal_tekst AS benodigdheden ON workshop.workshop_id = benodigdheden.tekst_nr JOIN taal_tekst AS maken ON workshop.workshop_id = maken.tekst_nr WHERE title.taal_id = :taal_id AND `workshop`.`workshop_id` = :workshop_id AND title.tekst_id = 'title' AND `ingredienten`.`tekst_id` = 'ingredienten' AND benodigdheden.tekst_id = 'benodigdheden' AND maken.tekst_id = 'maken' AND ingredienten.taal_id = title.taal_id AND benodigdheden.taal_id = ingredienten.taal_id AND maken.taal_id = benodigdheden.taal_id  AND title.section = 'workshop' AND ingredienten.section = title.section AND benodigdheden.section = ingredienten.section AND benodigdheden.section = maken.section");
    $getworkshop->bindParam(':workshop_id', $workshop_id);
    $getworkshop->bindParam(':taal_id', $taal_id);
    $getworkshop->execute();
    $arrayworkshop = $getworkshop->fetch();
    if (strpos($arrayworkshop['video'], 'youtube')) {
      if (strpos($arrayworkshop['video'], 'error?src=404')) {
        $arrayworkshop['video'] = $this->url.'404.php';
      }
      $arrayworkshop['video'] = str_replace("/watch?v=","/embed/",$arrayworkshop['video']);
    }else {
      $arrayworkshop['video'] = $this->url.'404.php';
    }
    return $arrayworkshop;
  }
}
