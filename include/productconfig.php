<?php

define('DB_SERVER', 's209.webhostingserver.nl');
define('DB_USERNAME', 'deb9339_stephan');
define('DB_PASSWORD', 'Stephan+31636513684');
define('DB_NAME', 'deb9339_webshop');


try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
$link_container = $pdo->prepare('Select * FROM product');
$link_container->execute();
$links = $link_container->fetchAll();
$link_count = count($links);
?>