<?php
require "include/database.php";
$getusers = $pdo->prepare("SELECT * FROM `user`");
$getusers->execute();

foreach ($getusers as $user) {
  echo $user['username'] . "<br>";
}
