<?php

class FactuurClass {
    public $user;
    private $dbClass;


    function __construct($user)
    {
        $this->user = $user;
        $this->dbClass = new DBClass();

    }
    public function GetFacatuur(){
        $pdo = $this->dbClass->makeConnection();
        $getfacatuur = $pdo->prepare("SELECT * FROM `factuur` WHERE `user_id` = :user");
        $getfacatuur->bindParam(':user', $this->user);
        $getfacatuur->execute();
        $factuur = $getfacatuur->fetchAll();
        foreach ($factuur as $x) { ?>
            <tr>
                <th scope="row"><?php echo $x['factuur_nr']; ?></th>
                <td><?php echo $x['user_id']; ?></td>
                <td><?php echo $x['factuur_datum']; ?></td>
                <td>niet verstuurd</td>
                <td>€34.-</td>
            </tr>
        <?php }
    }
}