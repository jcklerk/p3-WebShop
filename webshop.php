<?php
require "include/nav.php";

//$getproducts = $pdo->prepare("SELECT * FROM `products`");
//$getproducts->execute();
//$allproduct = $getproducts->fetchAll();
?>

    <body class="bc-gray-black">

    <div class="container container-web">

        <div class="row row-web">
            <div class="image-1-3 img-chinesefood d-flex align-items-center justify-content-center ">

                <div class="text-center ts-1 ">
                    <h1 class="fos-2 op">Chinese food</h1>

                </div>
            </div>


            <div class="image-1-3 img-japanesefood d-flex align-items-center justify-content-center ">

                <div class="text-center ts-1" >
                    <h1 class="fos-2">Japanese food</h1>

                </div>
            </div>

            <div class="image-1-3 img-koreanfood d-flex align-items-center justify-content-center ">

                <div class="text-center ts-1">
                    <h1 class="fos-2">Korean food</h1>

                </div>
            </div>
        </div>
    </div>


            <div class="row row-web-prod row-cols-1 row-cols-md-4 g-4 c-red">
                <?php
                foreach ($allproduct as $x) { ?>
                        <div class="col">
                    <div class="card h-100 bc-gray-black ">
            <img src="img/<?php echo $x['1']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $x['2']; ?> </h5>
                <p class="card-text"><?php echo $x['3']; ?></p>
                <p class="card-text">€<?php echo $x['4']; ?></p>
            </div>
                    </div>
                        </div>
               <?php }
                ?>

    </div>




    </body>

<?php
require "include/footer.php";
?>
