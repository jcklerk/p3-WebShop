<?php
require 'class/FooterClass.php';
if ($_SESSION['lang_id'] == 1){
    (new FooterClass())->GetProductCat();
}elseif($_SESSION['lang_id'] == 2){
    (new FooterClass())->GetProductall();
}
