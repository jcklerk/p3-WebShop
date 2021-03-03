<?php
require __DIR__ . '/webshop_config.php';
define('DB_SERVER', $PDO_domain);
define('DB_USERNAME', $PDO_user);
define('DB_PASSWORD', $PDO_passwd);
define('DB_NAME', $PDO_database);

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
