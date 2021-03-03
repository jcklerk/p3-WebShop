<?php
require "include/nav.php";
$gethome = $pdo->prepare("SELECT * FROM `taal_home` WHERE `taal_id` = :taal_id");
$gethome->bindParam(':taal_id', $_SESSION['lang_id']);
$gethome->execute();
$arrayhome = $gethome->fetchAll();
?>
<body class="bc-gray-black">

    <div class="parallax img-home d-flex align-items-center justify-content-center">

        <div class="text-center">
            <h1 class="c-red fos-1"><?php echo $arrayhome['0']['title_1']; ?></h1>
            <h1 class="c-white fos-2"><?php echo $arrayhome['0']['title_2']; ?></h1>
            <h1 class="c-yellow fos-2"><?php echo $arrayhome['0']['title_3']; ?></h1>
        </div>
    </div>


    <div>
    <div class="text-center">

        <h2 class="c-red p-5"><?php echo $arrayhome['0']['text_1']; ?></h2>

    </div>
    </div>

</body>

<?php
require "include/footer.php";
?>
