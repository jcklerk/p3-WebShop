<?php
include __DIR__.'/class/LangClass.php';
$url = (new DBClass())->ServerUrl();
$_SESSION['url'] = (new DBClass())->ServerUrl();
$srv_url = $url;
//
//$test = $pdo->prepare('')
//$test->bindParam(':test', $test_);
//$test->execute();
//$arraytest = $test->fetchAll();
//

session_start();
//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}

$cur_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

if (!isset($_SESSION['lang_id']) || !isset($_SESSION['lang_array']) || empty($_SESSION)) {
  // 2 is engels (Defalt)
  $_SESSION['lang_id'] = 2;
  $_SESSION['lang_array'] = 2 - 1;
  header('Location: '.$url);
} else{
   $arraylang = (new LangClass())->LangGetAll();
  foreach ($arraylang as $forlang) {
    if (isset($_POST['lang']) && $_POST['lang'] == $forlang['taal_id']){
        $_SESSION['lang_array'] =  $forlang['taal_id'] - 1;
        $_SESSION['lang_id'] =  $forlang['taal_id'];
    }
  }
}
// get database data of the correct lang text
$arraytekst = (new LangClass())->LangTekst();
//
print_r($arraytekst);

echo '<html lang="'. $arraylang[$_SESSION['lang_array']]['taal'] .'">';
echo '<link rel="icon"
      type="image/png"
      href="'.$url.'/img/logo.png">';

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="<?php echo $url; ?>css/color.css"    rel="stylesheet">
<link href="<?php echo $url; ?>css/parallax.css"   rel="stylesheet">
<link href="<?php echo $url; ?>css/text.css"   rel="stylesheet">
<link href="<?php echo $url; ?>css/webshop.css"   rel="stylesheet">
<link href="<?php echo $url; ?>css/accountpage.css"   rel="stylesheet">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

<!--JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
