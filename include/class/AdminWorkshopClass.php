<?php
/**
 *
 */
class AdminClass
{
  private $dbClass;
  private $pdo;

  private $workshop_title;
  private $workshop_img;
  private $video;
  private $img;



  function __construct($workshop_title, $workshop_img, $video, $img)
  {
    $this->dbClass = new DBClass();

    $this->workshop_title = $workshop_title;
    $this->workshop_img = $workshop_img;
    $this->video = $video;
    $this->img = $img;
  }


  public function WorkshopInsert()
  {
    $pdo = $this->dbClass->makeConnection();
    $workshop = $pdo->prepare("INSERT INTO workshop (workshop_title, workshop_img, video, img) VALUE (:workshop_title, :workshop_img, :video, :img)");
    $workshop->bindParam(':workshop_title', $this->workshop_title);
    $workshop->bindParam(':workshop_img', $this->workshop_img);
    $workshop->bindParam(':video', $this->video);
    $workshop->bindParam(':img', $this->img);
    $workshop->execute();
  }
}
?>
