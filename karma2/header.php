<?php

function nav_header()
{
    ob_start();
 ?>
    <div class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Pocetna</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Kupovina</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="korpa.php">Naruci porizvod</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pretragaproizvoda.php">Pretrazi Proizvode(id)</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pretraga.php">Pretrazi Proizvode(name)</a></li>

                                </ul>
                            </li>
                            <?php
                            if($_SESSION["role"] == "admin") {
                                ?>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true"
                                       aria-expanded="false">Admin</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="dodajmarku.php">Dodaj Marku</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="dodajmodel.php">Dodaj Model</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="artikal.php">Dodaj Artikal</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="tblKorisnici.php">Tabela korisnika</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="tblMarka.php">Tabela marka</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="tblModela.php">Tabela modela</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="tblArtikala.php">Tabela artikala</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            }
                                ?>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                   aria-expanded="false">Stranice</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.php">Prijavi se</a></li>
                                    <li class="nav-item"><a class="nav-link" href="logout.php">Odjavi se </a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php">Pocetna</a></li>
                                    <li class="nav-item"><a class="nav-link" href="korpa.php">Kupovina</a></li>

                                    <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="kontakt.php">Kontakt</a></li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>

    </div>

<?php }

?>

<?php

function style1(){ ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-t


        o-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="CodePixar">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Karma Shop</title>
        <!--
            CSS
            ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/nouislider.min.css">
        <link rel="stylesheet" href="css/ion.rangeSlider.css" />
        <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

    </body>
    </html>
<?php
}

?>

<?php

function style2(){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
<?php } ?>