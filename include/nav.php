<?php
require __DIR__ . '/config.php';
// get database data of the correct lang text
$getnav = $pdo->prepare("SELECT * FROM `taal_nav` WHERE `taal_id` = :taal_id");
$getnav->bindParam(':taal_id', $_SESSION['lang_id']);
$getnav->execute();
$arraynav = $getnav->fetchAll();
//
 ?>
<nav class="navbar navbar-expand-lg bc-gray-black fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand c-yellow" href="<?php echo $url; ?>">Navbar w/ text</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active c-yellow" aria-current="page" href="<?php echo $url; ?>"><?php echo $arraynav['0']['home']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>webshop.php"><?php echo $arraynav['0']['webshop']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>workshop.php"><?php echo $arraynav['0']['workshop']; ?></a>
                </li>
            </ul>
            <ul class="navbar-nav float-end" style="margin-right: 32px">
                                    <li class="nav-item dropdown">
                                    <a class="nav-link c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img style="height: 30px;" src="<?php echo $arraylang[$_SESSION['lang_array']]['flag']; ?>" alt="">
                                    </a>
                                    <ul class="dropdown-menu bc-gray-black" aria-labelledby="navbarDropdownMenuLink">
                                      <?php foreach ($arraylang as $forlang): ?>
                                        <li><img style="height: 20px;" src="<?php echo $forlang['flag']; ?>"><a class="dropdown-item c-yellow" href="<?php echo $url."?lang=".$forlang["taal_id"];?>"><?php echo $forlang["taal_naam"];?></a></li>
                                      <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav float-end" style="margin-right: 32px">
                        <!-- to do! Add lang support -->
                        <?php if (empty($_SESSION)) {
                            echo '
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                    </a>
                                    <ul class="dropdown-menu bc-gray-black" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item c-yellow" href="'.$url.'account.php">Account</a></li>
                                    <li><a class="dropdown-item c-yellow" href="'.$url.'logout.php">Logout</a></li>';
                        }else{
                            echo '
                                    <li class="nav-item">
                                     <a class="nav-link c-yellow" href="'.$url.'login.php">Login</a>
                                    </li>';
                        }

                        ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav float-end" style="margin-right: 32px">

                                    <li class="nav-item dropdown">
                                    <a class="nav-link c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <h2> <i class="bi bi-cart4"></i></h2>
                                    </a>
                                    <ul class="dropdown-menu bc-gray-black" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item c-yellow" href=""><?php echo $arraynav['0']['totaal']; ?></a></li>
                                    <li><a class="dropdown-item c-yellow" href=""><?php echo $arraynav['0']['afrekenen']; ?></a></li>
                                    <li><a class="dropdown-item c-yellow" href=""><?php echo $arraynav['0']['btw']; ?></a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
