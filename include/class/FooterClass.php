<?php


class FooterClass
{
    private $dbClass;

    function __construct()
    {
        $this->dbClass = new DBClass();
    }
    public function Getfooter(){
        $pdo = $this->dbClass->makeConnection();
        $getfooter = $pdo->prepare("SELECT * FROM `taal_footer` WHERE `taal_id` = :taal_id");
        $getfooter->bindParam(':taal_id', $_SESSION['lang_id']);
        $getfooter->execute();
        $footer = $getfooter->fetchAll();
        foreach ($footer as $x) { ?>
            <footer class="text-center bc-red c-yellow">
                <div class="container p-4">
                    <div class="row">
                        <div class="mb-4 mb-md-0 fw-bold"> <!-- removed from class: col-lg-6 col-md-12 -->
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
