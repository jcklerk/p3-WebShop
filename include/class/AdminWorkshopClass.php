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
    $workshop = $pdo->prepare("insert into workshop (workshop_title, workshop_img, video, img) value (:workshop_title, :workshop_img, :video, :workshop_img2)");
    $workshop->bindParam(':naam', $this->naam);
    $workshop->bindParam(':img', $this->img);
    $workshop->bindParam(':prijs', $this->prijs);
    $workshop->bindParam(':btw', $this->btw);
    $workshop->bindParam(':categorie', $this->categorie);
    $workshop->execute();
    return;
  }
}
?>
