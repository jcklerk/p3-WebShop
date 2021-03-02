<?php
require __DIR__ . '/webshop_config.php';
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
                    <a class="nav-link active c-yellow" aria-current="page" href="<?php echo $url; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>webshop.php">Webshop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>workshop.php">Workshop</a>
                </li>
            </ul>
            <ul class="navbar-nav float-end" style="margin-right: 32px">

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
                </li
            </ul>
        </div>
    </div>
</nav>
