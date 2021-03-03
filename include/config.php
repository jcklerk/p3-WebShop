<?php
session_start();
//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (empty($_SESSION['lang']) {
  $_SESSION['lang'] = 'en';
} else{
  if (isset($_GET['lang']) &&$_GET['lang'] == 'nl' ) {
      $_SESSION['lang'] = 'nl';
      $reload_url = str_replace("?lang=nl","",$url);
      header('Location: '.$reload_url);
  } elseif (isset($_GET['lang']) &&$_GET['lang'] == 'en' ) {
      $_SESSION['lang'] = 'en';
      $reload_url = str_replace("?lang=en","",$url);
      header('Location: '.$reload_url);
  }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="./css/color.css"    rel="stylesheet">
<link href="css/parallax.css"   rel="stylesheet">
<link href="css/text.css"   rel="stylesheet">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<!--JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
