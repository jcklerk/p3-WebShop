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
    $getworkshop = $pdo->prepare("SELECT * FROM `workshop` INNER JOIN `taal_workshop` ON workshop.workshop_id = taal_workshop.workshop_id WHERE `taal_id` = :taal_id");
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
}

class WorkShopsClass
{
  private $dbClass;
  public $url;
  public $workshop_id;
  public $taal_id;
  // maak niuewe database connection op dbClass
   function __construct($url, $workshop_id, $taal_id)
  {
    $this->dbClass = new DBClass();
    $this->url = $url;
    $this->workshop_id = $workshop_id;
    $this->taal_id = $taal_id;
  }
  public function GetWorkShop(){
    $pdo = $this->dbClass->makeConnection();
    $getworkshop = $pdo->prepare("SELECT * FROM `workshop` WHERE `workshop_id` = :workshop_id");
    $getworkshop->bindParam(':workshop_id', $this->workshop_id);
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

    public function WorkshopGet(){
        $pdo = $this->dbClass->makeConnection();
        $workshopget = $pdo->prepare("SELECT * FROM `taal_workshop` WHERE `workshop_id` = :workshop_id AND `taal_id` = :taal_id");
        $workshopget->bindParam(':workshop_id', $this->workshop_id);
        $workshopget->bindParam(':taal_id', $this->taal_id);
        $workshopget->execute();
        $arrayworkshoptext = $workshopget->fetch();
        return $arrayworkshoptext;
    }
}
