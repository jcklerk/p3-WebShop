<?php
//Coppy file content to webshop_config.php !!
class DBClass
{
  private $PDO_database = 'deb9339_webshop';
  private $PDO_user = 'deb9339_Milan';
  private $PDO_passwd = 'Milan+31613171703';
  private $PDO_domain = 's209.webhostingserver.nl:3306';
  public $url = 'https://localhost/p3-WebShop/';
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
      $url = 'https://192.168.1.119/p3-WebShop/';
      return $url;
    }

}
