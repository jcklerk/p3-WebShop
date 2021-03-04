<?php
require "include/nav.php";

$getproducts = $pdo->prepare("SELECT * FROM `products`");
$getproducts->execute();
$allproduct = $getproducts->fetchAll();
?>

    <body class="bc-gray-black">

    <div class="container" style="width: 100%!important; max-width: 100%!important;">

        <div class="row" style="flex-wrap: nowrap!important; padding-top: 3%!important; height: 50%!important;">
            <div class="image-1-3 img-chinesefood d-flex justify-content-center ">

                <div class="text-center ts-1">
                    <h1 class="fos-2">Chinese food</h1>

                </div>
            </div>


            <div class="image-1-3 img-japanesefood d-flex justify-content-center ">

                <div class="text-center ts-1" >
                    <h1 class="fos-2">Japanese food</h1>

                </div>
            </div>

            <div class="image-1-3 img-koreanfood d-flex justify-content-center ">

                <div class="text-center ts-1">
                    <h1 class="fos-2">Korean food</h1>

                </div>
            </div>
        </div>
    </div>

            <div class="row row-cols-1 row-cols-md-3 g-4 c-red" style="margin-top: 2%; padding: 2%">
        <div class="card bc-gray-black ">
            <img src="img/<?php echo $allproduct['0']['product-img']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $allproduct['0']['product']; ?> </h5>
                <p class="card-text"><?php echo $allproduct['0']['description']; ?></p>
                <p class="card-text">€<?php echo $allproduct['0']['price']; ?></p>
            </div>
        </div>
        <div class="card bc-gray-black">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card bc-gray-black"">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    <div class="card bc-gray-black"">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </div>
    <div class="card bc-gray-black"">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </div>
    </div>




    </body>

<?php
require "include/footer.php";
?>
