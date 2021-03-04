<?php
//Coppy file content to webshop_config.php !!
class DBClass
{
  private $PDO_database = '';
  private $PDO_user = '';
  private $PDO_passwd = '';
  private $PDO_domain = '';
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
      $url = 'https://192.168.1.119/p3-WebShop/';
      return $url;
    }

}
