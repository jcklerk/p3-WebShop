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


  public function WorkshopInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $workshop = $pdo->prepare("INSERT INTO workshop ( workshop_img, video, img) VALUE (:workshop_img, :video, :img)");
    $workshop->bindParam(':workshop_img', $this->workshop_img);
    $workshop->bindParam(':video', $this->video);
    $workshop->bindParam(':img', $this->img);
    $workshop->execute();
    $getworkshop_id = $pdo->prepare("SELECT LAST_INSERT_ID();");
    $getworkshop_id->execute();
    $workshop_id = $getworkshop_id->fetch();
    $this->workshop_id = $workshop_id['0'];
    foreach ($this->lang_post as $lang_post_array) {
      $taal = $pdo->prepare("INSERT INTO `taal_workshop` (`workshop_id`, `workshop_title`, `taal_id`, `ingredienten`, `benodigdheden`, `maken`) VALUES (:workshop_id, :workshop_title, :taal_id, :ingredienten, :benodigdheden, :maken);");
      $taal->bindParam(':workshop_id', $this->workshop_id);
      $taal->bindParam(':taal_id', $lang_post_array['taal_id']);
      $workshop->bindParam(':workshop_title', $lang_post_array['title']);
      $taal->bindParam(':ingredienten', $lang_post_array['ingredienten']);
      $taal->bindParam(':benodigdheden', $lang_post_array['benodigdheden']);
      $taal->bindParam(':maken', $lang_post_array['maken']);
      $taal->execute();
    }
  }
}
?>
