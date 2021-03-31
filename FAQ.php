<?php
require "include/nav.php";
$arrayFAQ  = (new LangClass())->LangGetFAQ();
?>
<title>Home - Wok & Roll</title>
<body class=" d-flex flex-column h-100" style="text-align: center">
  <h1 class="mt">FAQ</h1>
  <br>
  <div class="container">


  <?php foreach ($arrayFAQ as $FAQ){?>

    <div class="card text-white bg-secondary mb-3">
      <div class="card-header"><?php echo $FAQ['question']; ?></div>
      <div class="card-body">
        <h6 class="card-title"><?php echo str_replace('&euro', '€', $FAQ['answer']); ?></h5>
      </div>
    </div>
<?php } ?>

  </div>
</body>

<?php
require "include/footer.php";
?>
