<?php
require "include/nav.php";
$arrayFAQ  = (new LangClass())->LangGetFAQ();
?>
<title>Home - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">
  <h1 class="mt">Add Product</h1>
  <br>

  <?php foreach ($arrayFAQ as $FAQ){
    print_r($FAQ);
    ?>

    <div class="card">
  <div class="card-header">
    <?php echo $FAQ['question']; ?>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?php echo str_replace('&euro', '€', $FAQ['answer']); ?></p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>
<?php } ?>

</body>

<?php
require "include/footer.php";
?>
