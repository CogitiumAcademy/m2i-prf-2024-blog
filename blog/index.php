<?php

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
