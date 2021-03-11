<?php
session_start();
require ("../include/productconfig.php");
if (!empty($_POST['edit_img']) && !empty($_POST['edit_id']) && !empty($_POST['edit_naam']) && !empty($_POST['edit_prijs']) && !empty($_POST['edit_btw']) && !empty($_POST['edit_categorie'])) {
    $woordenedit = $pdo->prepare('UPDATE `product` SET `img` = :img, `naam` = :naam, `prijs` = :prijs, `btw` = :btw, `categorie` = :categorie WHERE `product`.`product_nr` = :product_nr ');
    $woordenedit->bindParam(':img', $_POST['edit_img']);
    $woordenedit->bindParam(':naam', $_POST['edit_naam']);
    $woordenedit->bindParam(':prijs', $_POST['edit_prijs']);
    $woordenedit->bindParam(':btw', $_POST['edit_btw']);
    $woordenedit->bindParam(':categorie', $_POST['edit_categorie']);
    $woordenedit->bindParam(':product_nr', $_POST['edit_id']);
    $woordenedit->execute();
    header('Location: ');
}

//error_reporting(0);
if (empty($_SESSION["score"])){
    $_SESSION["score"] = 0;
}
?>

<center>

    <h1>Stephan is de beste</h1>

    <div>
        <?php
        for ($i=0; $i <= $link_count - 1; $i++) { ?>

            <form method="post">
                <input type="text"      name="edit_naam"            value="<?php echo $links[$i]['naam']; ?>">
                <input type="text"      name="edit_img"             value="<?php echo $links[$i]['img']; ?>">
                <input type="text"      name="edit_prijs"           value="<?php echo $links[$i]['prijs']; ?>">
                <input type="text"      name="edit_btw"             value="<?php echo $links[$i]['btw']; ?>">
                <input type="text"      name="edit_categorie"       value="<?php echo $links[$i]['categorie']; ?>">
                <input type="hidden"    name="edit_id"              value="<?php echo $links[$i]["product_nr"]?>">
                <input type="submit"    name="edit"                 value="edit">
            </form>
            <?php
        }
        ?>
    </div>
</center>