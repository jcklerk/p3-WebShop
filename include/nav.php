<?php
require __DIR__ . '/config.php';

 ?>
<nav class="navbar navbar-expand-lg bc-gray-black">
    <div class="container-fluid">
        <a class="navbar-brand c-yellow" href="<?php echo $url; ?>"> <img style="height: 50px;" src="<?php echo $url; ?>/img/logo.png" alt=""> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><svg viewBox="0 0 100 80" width="40" height="40">
  <rect width="100" height="20"></rect>
  <rect y="30" width="100" height="20"></rect>
  <rect y="60" width="100" height="20"></rect>
</svg></span>
        </button>
        <!--dit is je kut probleem en idk what fix-->
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active c-yellow" aria-current="page" href="<?php echo $url; ?>"><?php echo $arraynav['home']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>webshop.php"><?php echo $arraynav['webshop']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-yellow" href="<?php echo $url; ?>workshop.php"><?php echo $arraynav['workshop']; ?></a>
                </li>
            </ul>
            <ul class="navbar-nav float-end" style="margin-right: 32px">
                                    <li class="nav-item dropdown">
                                    <a class="nav-link c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img style="height: 30px;" src="<?php echo $arraylang[$_SESSION['lang_array']]['flag']; ?>" alt="">
                                    </a>
                                    <ul class="dropdown-menu bc-gray-black" aria-labelledby="navbarDropdownMenuLink">
                                      <?php foreach ($arraylang as $forlang): ?>
                                        <form method="post" id="<?php echo $forlang["taal_id"];?>">
                                          <input type="text" name="lang" value="<?php echo $forlang["taal_id"];?>" hidden>
                                        </form>
                                        <li><a class="dropdown-item c-yellow" onclick="document.getElementById(<?php echo $forlang['taal_id'];?>).submit();"><img style="height: 20px;" src="<?php echo $forlang['flag']; ?>"> <?php echo $forlang["taal_naam"];?></a></li>
                                      <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav float-end" style="margin-right: 32px">
                        <!-- to do! Add lang support -->
                        <?php if (isset($_SESSION['user_id'])) {
                            echo '
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    '.$_SESSION['username'].'
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
                                    <li class="nav-item">
                                    <a class="nav-link c-yellow" href="<?php echo $url; ?>winkelwagen.php" role="button">
                                    <h2> <i class="bi bi-cart4"></i></h2></a>
                                  </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
