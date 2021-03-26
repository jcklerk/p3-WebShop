<?php

class showusers {
    public $user;
    private $dbClass;


    function __construct($user)
    {
        $this->user = $user;
        $this->dbClass = new DBClass();

    }
    public function ShowAllUsers(){
        $pdo = $this->dbClass->makeConnection();
        $getusers = $pdo->prepare("SELECT * FROM user");
        $getusers->execute();
        $getallusers = $getusers->fetchAll();

        foreach ($getallusers as $x) {
            ?>
            <tr>
                <th scope="row"><?php echo $x['user_id']; ?></th>
                <td><?php echo $x['username']; ?></td>
                <td><?php echo $x['voornaam']; ?></td>
                <td><?php echo $x['tussenvoegsel']; ?></td>
                <td><?php echo $x['achternaam']; ?></td>
                <td><?php echo $x['straatnaam']; ?></td>
                <td><?php echo $x['huisnummer']; ?></td>
                <td><?php echo $x['postcode']; ?></td>
            </tr>
        <?php }
    }
}
