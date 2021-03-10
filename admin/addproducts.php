<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
require "../include/nav.php";
require 'AdminClass.php';
(new FactuurClass($_SESSION['user_id']))->GetFacatuur();

?>



<?php
require "../include/footer.php";
?>
