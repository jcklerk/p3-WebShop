<?php
session_start();
require "../include/nav.php";

require ("../include/workshopconfig.php");
if (!empty($_POST['edit_title']) && !empty($_POST['edit_wimg']) && !empty($_POST['edit_video']) && !empty($_POST['edit_img']) && !empty($_POST['edit_id'])) {
    $woordenedit = $pdo->prepare('UPDATE `workshop` SET `workshop_title` = :workshop_title, `workshop_img` = :workshop_img, `video` = :video, `img` = :img WHERE `workshop`.`workshop_id` = :workshop_id ');
    $woordenedit->bindParam(':workshop_title',  $_POST['edit_title']);
    $woordenedit->bindParam(':workshop_img',    $_POST['edit_wimg']);
    $woordenedit->bindParam(':video',           $_POST['edit_video']);
    $woordenedit->bindParam(':img',             $_POST['edit_img']);
    $woordenedit->bindParam(':workshop_id',     $_POST['edit_id']);
    $woordenedit->execute();
    header('Location: #');
}

//error_reporting(0);
if (empty($_SESSION["score"])){
    $_SESSION["score"] = 0;
}
?>
    <link rel="stylesheet" href="../css/admin.css">
    <center>

    <body style="text-align: center">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/admin.css">
    <div class="container-fluid" style="margin-top: 100px">
        <form action="" method="post">
            <div class="container" style="background: #1A2226; color: #ECF0F5; border-radius: 10px">
                <div class="row row-cols-2">
                    <div class="col">
                        <label for="workshop_title">NAAM</label>
                        <input name="workshop_title" class="form-control" type="text" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label for="workshop_img">IMG</label>
                        <input name="workshop_img" class="form-control" type="text" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label for="video">VIDEO</label>
                        <input name="video" class="form-control" type="text" autocomplete="off" required>
                    </div>
                    <div class="col">
                        <label for="img">IMG 2</label>
                        <input name="img" class="form-control" autocomplete="off" type="text" required>
                    </div>
                    <?php foreach ($arraylang as $forlang): ?>
                        <div class="col">
                            <div class="">
                                <label for="img">TAAL: <?php echo $forlang["taal_naam"]?></label>
                                <br>
                                <label for="img">ingredienten</label>
                                <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:ingredienten" class="form-control"></textarea>
                            </div>
                            <div class="">
                                <label for="img">benodigdheden</label>
                                <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:benodigdheden" class="form-control"></textarea>
                            </div>
                            <div class="">
                                <label for="img">maken</label>
                                <textarea required rows="4" cols="50" name="<?php echo $forlang['taal_id'];?>:maken" class="form-control"></textarea>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <br>
                <input type="submit" class="btn btn-outline-primary" name="add" value="add">
        </form>
    </div><br><br>
    </div>
    </body>

<?php
require "../include/footer.php";
?>