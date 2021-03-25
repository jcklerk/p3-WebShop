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


  function __construct($workshop_img, $video, $img, $lang_post)
  {
    $this->dbClass = new DBClass();

    $this->workshop_img = $workshop_img;
    $this->video = $video;
    $this->img = $img;
    $this->lang_post = $lang_post;
  }
  public function WorkShopData()
  {
    if (!empty($_GET['workshop'])) {
    $pdo = $this->dbClass->makeConnection();
    $workshop_nr = $_GET['workshop'];
    $workshop = $pdo->prepare("SELECT * FROM `workshop` INNER JOIN `taal_workshop` ON workshop.workshop_id = taal_workshop.workshop_id WHERE workshop.workshop_id = :workshop_id");
    $workshop->bindParam(':workshop_id', $workshop_nr);
    $workshop->execute();
    $array_workshop = $workshop->fetchall();
    return $array_workshop;
    } else {
      echo "geen product geselecteerd!";
    }
  }


  public function WorkshopInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $workshop = $pdo->prepare("INSERT INTO workshop (workshop_img, video, img) VALUE (:workshop_img, :video, :img)");
    $workshop->bindParam(':workshop_img', $this->workshop_img);
    $workshop->bindParam(':video', $this->video);
    $workshop->bindParam(':img', $this->img);
    $workshop->execute();
    $getworkshop_id = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getworkshop_id->execute();
    $workshop_id = $getworkshop_id->fetch();
    $this->workshop_id = $workshop_id['0'];
    foreach ($this->lang_post as $lang_post_array) {
      $taal = $pdo->prepare("INSERT INTO `taal_workshop` (`workshop_id`, `taal_id`, `workshop_title`, `ingredienten`, `benodigdheden`, `maken`) VALUES (:workshop_id, :taal_id, :workshop_title, :ingredienten, :benodigdheden, :maken);");
      $taal->bindParam(':workshop_id', $this->workshop_id);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $taal->bindParam(':workshop_title', $lang_post_array['title']);
      $taal->bindParam(':ingredienten', $lang_post_array['ingredienten']);
      $taal->bindParam(':benodigdheden', $lang_post_array['benodigdheden']);
      $taal->bindParam(':maken', $lang_post_array['maken']);
      $taal->execute();
    }
    echo '<script type="text/javascript">window.location.href = "'.$srv_url.'admin/addworkshop.php/";</script>';
  }
  public function ProductUpdate()
  {
    if (!empty($_GET['product'])) {
    $pdo = $this->dbClass->makeConnection();
    $workshop_id = $_GET['workshop'];
    $workshop = $pdo->prepare("UPDATE `workshop` SET `workshop_img` = :img, `video` = :video, `img` = :img2 WHERE `workshop`.`workshop_id` = :workshop_id;");
    $workshop->bindParam(':img', $this->img);
    $workshop->bindParam(':video', $this->prijs);
    $workshop->bindParam(':img2', $this->btw);
    $workshop->bindParam(':workshop_id', $workshop_id);
    $workshop->execute();
    $this->workshop_id = $workshop_id['0'];
    foreach ($this->lang_post as $lang_post_array) {
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
    echo '<script type="text/javascript">window.location.href = "'.$_SESSION['url'].'editproducts.php?product='.$product_nr.'";</script>';
  } else {
    echo "geen product geselecteerd!";
  }
  }
}

class AdminWorkshopsClass
{
  private $dbClass;
  private $pdo;

  function __construct()
  {
    $this->dbClass = new DBClass();
  }
  public function GetAllWorkshops()
  {
    $pdo = $this->dbClass->makeConnection();
    $getproducts = $pdo->prepare("SELECT * FROM `workshop`INNER JOIN `taal_workshop` ON workshop.workshop_id = taal_workshop.workshop_id WHERE  `taal_id` = :taal_id");
    $getproducts->bindParam(':taal_id', $_SESSION['lang_id']);
    $getproducts->execute();
    $allproduct = $getproducts->fetchAll();
    return $allproduct;
  }
}
?>
