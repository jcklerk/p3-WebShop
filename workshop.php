<?php
require "include/nav.php";
$getworkshop = $pdo->prepare("SELECT * FROM `workshop` ");
$getworkshop->execute();
$arrayworkshop = $getworkshop->fetchAll();
?>
<body class="bc-gray-black">
<?php foreach ($arrayworkshop as $forworkshop): ?>
  <div class="parallax-halfheight d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $forworkshop['workshop_img']; ?>);">
      <a href="<?php echo $url;?>workshops.php/?workshops=<?php echo $forworkshop['workshop_id'];?>">
        <div onclick='window.location.href = "<?php echo $url."workshops.php/?workshops=".$forworkshop['workshop_id;?>";' class="text-center">
            <h1 class="fos-2"><?php echo $forworkshop['workshop_title']; ?></h1>
        </div>
      </a>
  </div>
<?php endforeach; ?>
</body>

<?php
require "include/footer.php";
?>
