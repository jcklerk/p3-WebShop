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

    <center>

        <h1 style="margin-top: 100px">Stephan is de beste</h1>

        <div>
            <?php
            for ($i=0; $i <= $link_count - 1; $i++) { ?>

                <form method="post">
                    <input type="hidden"    name="edit_id"              value="<?php echo $links[$i]["workshop_id"]?>">
                    <input type="text"      name="edit_title"           value="<?php echo $links[$i]['workshop_title']; ?>">
                    <input type="text"      name="edit_wimg"            value="<?php echo $links[$i]['workshop_img']; ?>">
                    <input type="text"      name="edit_video"           value="<?php echo $links[$i]['video']; ?>">
                    <input type="text"      name="edit_img"             value="<?php echo $links[$i]['img']; ?>">
                    <input type="submit"    name="edit"                 value="edit">
                </form>
                <?php
            }
            ?>
        </div>
    </center>

<?php
require "../include/footer.php";
?>