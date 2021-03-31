<?php
require "include/nav.php";
$arrayFAQ  = (new LangClass())->LangGetFAQ();
?>
<title>Home - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">


  <?php foreach ($arrayFAQ as $FAQ): ?>
    
  <?php endforeach; ?>

</body>

<?php
require "include/footer.php";
?>
