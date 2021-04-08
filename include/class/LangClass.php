<?php
// in productie de DBClass gebruiken PLZ
//require __DIR__ . '/DBClass.php';
// Met git deze gebruiken in plaats van hier boven PLZ
require __DIR__ . '/../webshop_config.php';
/**
 *
 */
class LangClass
{
  private $dbClass;
  private $pdo;
  // maak niuewe database connection op dbClass
   function __construct()
  {
    $this->dbClass = new DBClass();
  }
  // get talen functie
  public function LangGetAll(){
    $pdo = $this->dbClass->makeConnection();
    $getlang = $pdo->prepare("SELECT * FROM `talen`");
    $getlang->execute();
    $arraylang = $getlang->fetchAll();
    return $arraylang;
  }
  // get vertaling functie
  public function LangTekst(){
    $pdo = $this->dbClass->makeConnection();
    $gettekst = $pdo->prepare("SELECT tekst_id, tekst FROM `taal_tekst` WHERE `taal_id` = :taal_id");
    $gettekst->bindParam(':taal_id', $_SESSION['lang_id']);
    $gettekst->execute();
    $databasetekst = $gettekst->fetchAll();
    $arraytekst = array();
    foreach ($databasetekst as $tekst) {
      $arraytekst[$tekst['tekst_id']] = $tekst['tekst'];
    }
    return $arraytekst;
  }
    // get FAQ functie
    public function LangGetFAQ()
    {
        $pdo = $this->dbClass->makeConnection();
        $getFAQ = $pdo->prepare("SELECT * FROM `taal_FAQ` WHERE `taal_id` = :taal_id");
        $getFAQ->bindParam(':taal_id', $_SESSION['lang_id']);
        $getFAQ->execute();
        $arrayFAQ = $getFAQ->fetchAll();
        return $arrayFAQ;
    }
}
