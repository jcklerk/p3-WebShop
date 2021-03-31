<?php


class CategorieClass
{
    public $cat;
    private $dbClass;
    public $url;

    function __construct($url)
    {
        $this->dbClass = new DBClass();
        $this->url = $url;
    }
    public function cat_taal(){
        $pdo = $this->dbClass->makeConnection();
        $cattaal = $pdo->prepare("SELECT * FROM `taal_shop` WHERE `taal_id` = :taal_id");
        $cattaal->bindParam(':taal_id', $_SESSION['lang_id']);
        $cattaal->execute();
        $taalcat = $cattaal->fetchAll();
        foreach ($taalcat as $x) { ?>
            <div class="container container-web">
                <div class="row row-web grid-gap">
                    <div class="image-1-3 img-chinesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=0'">
                        <div class="text-center ts-1">
                            <h1 class="fos-2 op"><?php echo $x['cat_chinese']?></h1>
                        </div>
                    </div>
                    <div class="image-1-3 img-japanesefood d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=1'">
                        <div class="text-center ts-1" >
                            <h1 class="fos-2"><?php echo $x['cat_japanese']?></h1>
                        </div>
                    </div>
                    <div class="image-1-3 img-indian d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=2'">
                        <div class="text-center ts-1">
                            <h1 class="fos-2"><?php echo $x['cat_indian']?></h1>
                        </div>
                    </div>
                </div>
                <div class="row row-web grid-gap">
                    <div class="image-1-3 img-tai d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=3'">
                        <div class="text-center ts-1">
                            <h1 class="fos-2"><?php echo $x['cat_tai']?></h1>
                        </div>
                    </div>
                    <div class="image-1-3 img-vait d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=4'">
                        <div class="text-center ts-1">
                            <h1 class="fos-2"><?php echo $x['cat_viat']?></h1>
                        </div>
                    </div>
                    <div class="image-1-3 img-wok d-flex align-items-center justify-content-center" onclick="window.location.href='<?php echo $this->url;?>webshop.php/?cat=5'">
                        <div class="text-center ts-1">
                            <h1 class="fos-2"><?php echo $x['cat_wok']?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
}
