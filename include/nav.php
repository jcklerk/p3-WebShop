<?php
require __DIR__ . '/webshop_config.php';
require __DIR__ . '/User.php';
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
              <?php if ($_SESSION['lang'] == 'en'): ?>
                <li class="nav-item">
                  <a href="<?php echo $url.'?lang=nl';?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 9 6">
                     <rect fill="#21468B"	width="9" height="6"/>
                     <rect fill="#FFF" width="9" height="4"/>
                     <rect fill="#AE1C28"	width="9" height="2"/>
                    </svg>
                  </a>
                </li>
              <?php elseif($_SESSION['lang'] == 'nl'): ?>
                <a href="<?php echo $url.'?lang=en';?>">
                  <svg width="30" height="20" version="1.1" viewBox="0 0 50 30" xmlns="http://www.w3.org/2000/svg">
                   <clipPath>
                    <path d="m25 15h25v15zv15h-25zh-25v-15zv-15h25z"/>
                   </clipPath>
                   <g>
                    <rect x="9.8296e-6" y="-1.8681e-6" width="50" height="30" fill="#fff" style="paint-order:markers fill stroke"/>
                    <path d="m-7e-6 -5e-7v2.3321l12.779 7.6678 3.8871-1e-4zm22 0v11.999h-22v5.9961h22v12.005h5.9998v-12.005h22v-5.9961h-22v-11.999zm24.112 0-16.113 9.6675v0.33232h3.3336l16.666-9.9998zm-29.488 20-16.625 10h3.8873l16.112-9.668v-0.33203zm16.709 0 16.666 10v-2.3323l-12.777-7.6677z" fill="#c8102e" style="paint-order:markers fill stroke"/>
                    <path d="m5.85-5e-7 14.15 8.5002v-8.5002zm24.15 0v8.5016l14.17-8.5016zm-30 3.4985v6.5006l10.836 7.55e-4zm50 2.1e-4 -10.835 6.5011h10.835zm-50 16.501v6.5021l10.835-6.5021zm39.169 0 10.831 6.576v-6.576zm-9.1689 1.4986v8.5014h14.17zm-10 3.99e-4 -14.169 8.501h14.169z" fill="#012169" style="paint-order:markers fill stroke"/>
                   </g>
                  </svg>
                </a>
              <?php endif; ?>

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
                </li>
            </ul>
            <ul class="navbar-nav float-end" style="margin-right: 32px">

                                    <li class="nav-item dropdown">
                                    <a class="nav-link c-yellow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <h2> <i class="bi bi-cart4"></i></h2>
                                    </a>
                                    <ul class="dropdown-menu bc-gray-black" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item c-yellow" href="'.$url.'account.php">Account</a></li>
                                    <li><a class="dropdown-item c-yellow" href="'.$url.'logout.php">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
