<!DOCTYPE html>
<html lang="en">
<head>
    <!---------- Pour l'URL rewriting ---------->
    <?php define('BASE_DIR', $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["HTTP_HOST"] . ((dirname($_SERVER['SCRIPT_NAME']) != '/') ? dirname($_SERVER['SCRIPT_NAME']) : '')); ?>
    <base href="<?php echo BASE_DIR; ?>/" >
    <!-------------(voir .htaccess))------------>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="<?= $meta_descr ?>"/>
    <meta name="author" content=""/>
    <title><?= $title ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
          rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="public/clean/css/styles.css" rel="stylesheet"/>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="?"><?= SITE_NAME ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="?">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=about">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=contact">Contact</a></li>

                <?php if (!isGranted()) { ?>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=register">Register</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=profil">
                            [ Bonjour <?= $_SESSION['user']['firstName'] ?> ]
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=addpost">
                            Proposer un article
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="?page=logout">Logout)</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header-->
<header class="masthead" style="background-image: url('<?= $header_bg ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Affichage des notifications. Voir lib/flash.lib.php -->
                <?= get_flash_messages(); ?>
                <div class="site-heading">
                    <h1><?= $title_h1 ?></h1>
                    <span class="subheading"><?= $subheading ?></span>
                </div>
            </div>
        </div>
    </div>
</header>