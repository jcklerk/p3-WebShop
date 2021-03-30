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
            <footer class="text-center bc-red c-yellow footer mt-auto py-3">
                <div class="container p-4">
                    <div class="row">
                        <div class="mb-4 mb-md-0 fw-bold"> <!-- removed from class: col-lg-6 col-md-12 -->
                            <p class="c-yellow">
                                <h4> Contact:</h4> Mail: example@example.com <br> <?php echo $x['phone'] ?> nr: +31 123456789 <br> <?php echo $x['adres'] ?>: Nederland, Harderwijk, Westeinde 33
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
