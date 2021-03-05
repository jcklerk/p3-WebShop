<?php
//Coppy file content to webshop_config.php !!
class DBClass
{
  private $PDO_database = ''; // niet in vullen maar vul het in in webshop_config.php
  private $PDO_user = '';     // niet in vullen maar vul het in in webshop_config.php
  private $PDO_passwd = '';   // niet in vullen maar vul het in in webshop_config.php
  private $PDO_domain = '';   // niet in vullen maar vul het in in webshop_config.php
  public $url = '';
    public function makeConnection()
    {
      try{
          $pdo = new PDO("mysql:host=" . $this->PDO_domain . ";dbname=" . $this->PDO_database, $this->PDO_user, $this->PDO_passwd);
          // Set the PDO error mode to exception
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e){
          die("ERROR: Could not connect. " . $e->getMessage());
      }
      return $pdo;
    }
    public function ServerUrl(){
      $url = 'https://localhost/p3-WebShop/';
      return $url;
    }

}
