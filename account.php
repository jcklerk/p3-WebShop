<?php
require "include/database.php";
$getusers = $pdo->prepare("SELECT * FROM `user`");
$getusers->execute();

foreach ($getusers as $user) {
  echo $user['username'] . "<br>";
}


//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();
