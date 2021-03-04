<?php
require "include/nav.php";
$arrayhome = (new LangClass())->LangGetHome();
?>
<body class="bc-gray-black">

    <div class="parallax img-home d-flex align-items-center justify-content-center">

        <div class="text-center">
            <h1 class="c-red fos-1"><?php echo $arrayhome['title_1']; ?></h1>
            <h1 class="c-white fos-2"><?php echo $arrayhome['title_2']; ?></h1>
            <h1 class="c-yellow fos-2"><?php echo $arrayhome['title_3']; ?></h1>
        </div>
    </div>


    <div>
    <div class="text-center">

        <h2 class="c-red p-5"><?php echo $arrayhome['text_1']; ?></h2>

    </div>
    </div>

</body>

<?php
require "include/footer.php";
?>
