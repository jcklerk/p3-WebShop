<?php


class FooterClass
{
    private $dbClass;

    function __construct()
    {
        $this->dbClass = new DBClass();
    }
    public function GetProductCat(){
        $pdo = $this->dbClass->makeConnection();
        $getproducts = $pdo->prepare("SELECT * FROM `taal_footer` WHERE `taal_id` = 1");
        $getproducts->execute();
        $catproduct = $getproducts->fetchAll();
        foreach ($catproduct as $x) { ?>
            <footer class="text-center bc-red c-yellow">
                <div class="container p-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0 fw-bold">
                            <p class="c-yellow">
                                Contact: <br> Mail: <br> <?php echo $x['phone'] ?> nr: <br> <?php echo $x['adres'] ?>:
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center p-3 fw-bold" style=" background-color: rgba(151, 0, 0, 0.5);">
                    © 2021 Copyright:
                    <a>SD20-1</a>
                </div>
            </footer>
        <?php }
    }
    public function GetProductall(){
        $pdo = $this->dbClass->makeConnection();
        $getproducts = $pdo->prepare("SELECT * FROM `taal_footer` WHERE `taal_id` = 2");
        $getproducts->execute();
        $allproduct = $getproducts->fetchAll();
        foreach ($allproduct as $x) { ?>
            <footer class="text-center bc-red c-yellow">
                <div class="container p-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0 fw-bold">
                            <p class="c-yellow">
                                Contact: <br> Mail: <br> <?php echo $x['phone'] ?> nr: <br> <?php echo $x['adres'] ?>:
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center p-3 fw-bold" style=" background-color: rgba(151, 0, 0, 0.5);">
                    © 2021 Copyright:
                    <a>SD20-1</a>
                </div>
            </footer>
        <?php }
    }
}