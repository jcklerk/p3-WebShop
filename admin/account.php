<style>

    #page {
        display: grid;
        width: 100%;
        height: 100%;
        grid-template:
                [header-left] "head head" 0px [header-right]
                 [main-left]   "nav  main" 1fr  [main-right]
                 [footer-left] "nav  foot" 0px [footer-right]
                 / 120px 1fr;
    }


    header {
        background-color: black;
        grid-area: head;
        color: pink;
    }

    nav {
        background-color: black;
        grid-area: nav;
        color: pink;

    }

    main {
        background-color: black;
        grid-area: main;
        color: pink;
        text-align: center;
    }

    footer {
        background-color: black   ;
        grid-area: foot;
        color: pink;
    }
    hr {
        height: 1px;
        color: blue;
        background-color: red;
        border: none;
    }
.zijkant {
    border: 5px solid red;
}
a {
    text-decoration: none;
}
</style>
<?php

//require __DIR__ . '/User.php';
//$user = new User();
//$user->login();

require "../include/nav.php";
//require "../include/class/FactuurClass.php";

?>
<section id="page">
    <header></header>

    <nav>

        <table style="">
            <table style="">
                <a href=""></a><br>
                <a href=""></a><br>
                <a href=""></a><br>
            </table>
            <div class="zijkant">
            menu
            <hr style="background-color: red; height: 10px">
            <a href="products.php">Producten</a><br>
            <a href="addproducts.php">add producten</a><br>
            <a href="editproducts.php">edit Producten</a><br>
        </table>
        <table style="">
            <br>
            Products<br>
            <hr style="background-color: red; height: 10px">
            <a href="products.php">Producten</a><br>
            <a href="addproducts.php">add producten</a><br>
            <a href="editproducts.php">edit Producten</a><br>
        </table>
        <br>
        <table style="">
            <br>
            workshops<br>
            <hr style="background-color: red; height: 10px">
            <a href="workshops.php">Workshops</a><br>
            <a href="addworkshop.php">add workshop</a><br>
            <a href="editworkshop.php">edit workshop</a><br>
        </table></nav></div>
    <main>
        <table style="">
            <a href=""></a><br>
            <a href=""></a><br>
            <a href=""></a><br>
        </table>
        <form action="" method="post" class="register-form">

            <div class="row" style="--bs-gutter-x: 0 rem !important;">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="naam">NAAM</label>
                    <input name="naam" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
            <div class="row" style="--bs-gutter-x: 0 rem !important;">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="img">IMG</label>
                    <input name="img" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
            <div class="row" style="--bs-gutter-x: 0 rem !important;">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="prijs">PRIJS</label>
                    <input name="prijs" class="form-control" type="text" autocomplete="off" required>
                </div>
            </div>
            <div class="row" style="--bs-gutter-x: 0 rem !important;">
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <label for="btw">BTW</label>
                    <input name="btw" class="form-control" autocomplete="off" type="text">
                </div>
                <div class="row" style="--bs-gutter-x: 0 rem !important;">
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <label for="categorie">CATEGORIE</label>
                        <input name="categorie" class="form-control" type="text" autocomplete="off" required>
                    </div>
                </div></main>
    <footer>lelijke footer</footer>
</section>

<?php
require "../include/footer.php";
?>