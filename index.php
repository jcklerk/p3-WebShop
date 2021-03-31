<?php
require "include/nav.php";
$arrayhome = (new LangClass())->LangGetHome();
?>
<title>Home - Wok & Roll</title>
<body class="bc-gray-black d-flex flex-column h-100">

    <div class="parallax img-home d-flex align-items-center justify-content-center">

        <div class="text-center">
          <br>
            <h1 class="c-red fos-1"><?php echo $arrayhome['title_1']; ?></h1>
            <h1 class="c-white fos-2"><?php echo $arrayhome['title_2']; ?></h1>
            <h1 class="c-yellow fos-2"><?php echo $arrayhome['title_3']; ?></h1>
            <br>
            <br>
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
