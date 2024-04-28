<?php
require("config/config.inc.php");

require("sql/pdoConnect.inc.php");
$pdo = pdoConnect();
//var_dump($pdo); exit;

$meta_descr = "";
$title = "Surf Blog";
$title_h1 = "Surf Blog !";
$header_bg = "public/clean/assets/img/home-bg.jpg";
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
