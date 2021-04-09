<?php
/**
 *
 */
class AdminWorkshopClass
{
  private $dbClass;
  private $pdo;

  private $workshop_img;
  private $video;
  private $img;
  private $lang_post;
  private $workshop_id;


  function __construct()
  {
    $this->dbClass = new DBClass();
  }
  public function WorkShopData()
  {
    if (!empty($_GET['workshop'])) {
    $pdo = $this->dbClass->makeConnection();
    $workshop_nr = $_GET['workshop'];
    $workshop = $pdo->prepare("SELECT `workshop`.`workshop_id`, `workshop`.`workshop_img`, `workshop`.`video`, `workshop`.`img`, `title`.`tekst` AS workshop_title, `ingredienten`.`tekst` AS ingredienten, `benodigdheden`.`tekst` AS benodigdheden, `maken`.`tekst` AS maken FROM `workshop` JOIN `taal_tekst` AS `title` ON `workshop`.`workshop_id` = `title`.`tekst_nr` JOIN `taal_tekst` AS `ingredienten` ON `workshop`.`workshop_id` = `ingredienten`.`tekst_nr` JOIN taal_tekst AS benodigdheden ON workshop.workshop_id = benodigdheden.tekst_nr JOIN taal_tekst AS maken ON workshop.workshop_id = maken.tekst_nr WHERE `workshop`.`workshop_id` = :workshop_id AND title.tekst_id = 'title' AND `ingredienten`.`tekst_id` = 'ingredienten' AND benodigdheden.tekst_id = 'benodigdheden' AND maken.tekst_id = 'maken' AND ingredienten.taal_id = title.taal_id AND benodigdheden.taal_id = ingredienten.taal_id AND maken.taal_id = benodigdheden.taal_id  AND title.section = 'workshop' AND ingredienten.section = title.section AND benodigdheden.section = ingredienten.section AND benodigdheden.section = maken.section");
    $workshop->bindParam(':workshop_id', $workshop_nr);
    $workshop->execute();
    $array_workshop = $workshop->fetchall();
    return $array_workshop;
    } else {
      echo "geen product geselecteerd!";
    }
  }


  public function WorkshopInsert($workshop_img, $video, $img, $lang_post)
  {
    $pdo = $this->dbClass->makeConnection();
    $workshop = $pdo->prepare("INSERT INTO workshop (workshop_img, video, img) VALUE (:workshop_img, :video, :img)");
    $workshop->bindParam(':workshop_img', $workshop_img);
    $workshop->bindParam(':video', $video);
    $workshop->bindParam(':img', $img);
    $workshop->execute();
    $getworkshop_id = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getworkshop_id->execute();
    $workshop_id = $getworkshop_id->fetch();
    $workshop_id = $workshop_id['0'];
    foreach ($lang_post as $lang_post_array) {
      $taal = $pdo->prepare("INSERT INTO `taal_workshop` (`workshop_id`, `taal_id`, `workshop_title`, `ingredienten`, `benodigdheden`, `maken`) VALUES (:workshop_id, :taal_id, :workshop_title, :ingredienten, :benodigdheden, :maken);");
      $taal->bindParam(':workshop_id', $workshop_id);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':workshop_title', $lang_post_array['title']);
      $taal->bindParam(':ingredienten', $lang_post_array['ingredienten']);
      $taal->bindParam(':benodigdheden', $lang_post_array['benodigdheden']);
      $taal->bindParam(':maken', $lang_post_array['maken']);
      $taal->execute();
    }
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'admin/addworkshop.php/";</script>';
  }
  public function WorkshopUpdate($workshop_img, $video, $img, $lang_post)
  {
    if (!empty($_GET['workshop'])) {
    $pdo = $this->dbClass->makeConnection();
    $workshop_id = $_GET['workshop'];
    $workshop = $pdo->prepare("UPDATE `workshop` SET `workshop_img` = :workshop_img, `video` = :video, `img` = :img WHERE `workshop`.`workshop_id` = :workshop_id;");
    $workshop->bindParam(':workshop_img', $workshop_img);
    $workshop->bindParam(':video', $video);
    $workshop->bindParam(':img', $img);
    $workshop->bindParam(':workshop_id', $workshop_id);
    $workshop->execute();
    $workshop_id = $workshop_id['0'];
    foreach ($lang_post as $lang_post_array) {
      $taal = $pdo->prepare("UPDATE `taal_workshop` SET `workshop_title` = :workshop_title, `ingredienten` = :ingredienten, `benodigdheden` = :benodigdheden, `maken` = :maken WHERE `taal_workshop`.`workshop_id` = :workshop_id AND `taal_workshop`.`taal_id` = :taal_id;");
      $taal->bindParam(':workshop_id', $workshop_id);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':workshop_title', $lang_post_array['title']);
      $taal->bindParam(':ingredienten', $lang_post_array['ingredienten']);
      $taal->bindParam(':benodigdheden', $lang_post_array['benodigdheden']);
      $taal->bindParam(':maken', $lang_post_array['maken']);
      $taal->execute();
    }
    unset($_POST);
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'editworkshop.php?workshop='.$workshop_id.'";</script>';
  } else {
    echo "geen product geselecteerd!";
  }
  }
  public function GetAllWorkshops()
  {
    $pdo = $this->dbClass->makeConnection();
    $getproducts = $pdo->prepare("SELECT `workshop`.`workshop_id`, `workshop`.`workshop_img`, `workshop`.`video`, `workshop`.`img`, `title`.`tekst` AS workshop_title, `ingredienten`.`tekst` AS ingredienten, `benodigdheden`.`tekst` AS benodigdheden, `maken`.`tekst` AS maken FROM `workshop` JOIN `taal_tekst` AS `title` ON `workshop`.`workshop_id` = `title`.`tekst_nr` JOIN `taal_tekst` AS `ingredienten` ON `workshop`.`workshop_id` = `ingredienten`.`tekst_nr` JOIN taal_tekst AS benodigdheden ON workshop.workshop_id = benodigdheden.tekst_nr JOIN taal_tekst AS maken ON workshop.workshop_id = maken.tekst_nr WHERE title.taal_id = :taal_id AND title.tekst_id = 'title' AND `ingredienten`.`tekst_id` = 'ingredienten' AND benodigdheden.tekst_id = 'benodigdheden' AND maken.tekst_id = 'maken' AND ingredienten.taal_id = title.taal_id AND benodigdheden.taal_id = ingredienten.taal_id AND maken.taal_id = benodigdheden.taal_id  AND title.section = 'workshop' AND ingredienten.section = title.section AND benodigdheden.section = ingredienten.section AND benodigdheden.section = maken.section");
    $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
    $getproducts->execute();
    $allproduct = $getproducts->fetchAll();
    return $allproduct;
  }
  public function Removeworkshop()
  {
    if (isset($_GET['workshop'])) {
      $pdo = $this->dbClass->makeConnection();
      $rmproducts = $pdo->prepare("DELETE FROM `workshop` WHERE `workshop`.`workshop_id` = :workshop_id");
      $rmproducts->bindParam(':workshop_id', $_GET['workshop']);
      $rmproducts->execute();
      $rmproducts_lang = $pdo->prepare("DELETE FROM `taal_workshop` WHERE `taal_workshop`.`workshop_id` = :workshop_id");
      $rmproducts_lang->bindParam(':workshop_id', $_GET['workshop']);
      $rmproducts_lang->execute();
      echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'workshops.php'.'";</script>';
    } else{
      echo "geen product geselecteerd!";
      echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'workshops.php'.'";</script>';
    }
  }
}
?>
