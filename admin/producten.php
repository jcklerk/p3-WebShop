<?php
require "../include/nav.php";
require 'AdminClass.php';
(new FactuurClass($_SESSION['user_id']))->GetFacatuur();

?>
<div>
    fuck jarik
</div>
<?php
require "../include/footer.php";
?>
