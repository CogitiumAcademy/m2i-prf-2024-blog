<?php

// Initialisation de ma session
session_start();

//var_dump($_COOKIE);

require("config/config.inc.php");
require("sql/pdoConnect.inc.php");
$pdo = pdoConnect();
//var_dump($pdo); exit;

// Chargement des librairies
require 'core/core.inc.php';
require 'lib/flash.lib.php';

$meta_descr = "";
$title = "Surf Blog";
$title_h1 = "Surf Blog !";
$header_bg = "public/clean/assets/img/header-bg.jpg";
$subheading = "";

$page = "home";

if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

$url = "page/$page.php";

if (file_exists($url)) {
    require($url);
} else {
    echo "404 file not found !!!";
}

// Profiler (version simplifiée)
if (ENV == 'DEV') {
    echo '<h2>Debug $_SESSION</h2>';
    var_dump($_SESSION);
    echo '<h2>Debug $_REQUEST</h2>';
    var_dump($_REQUEST);
    echo '<h2>Debug $_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>Debug $_ENV</h2>';
    var_dump($_ENV);
    echo '<h2>Debug $_SERVER</h2>';
    var_dump($_SERVER);
}