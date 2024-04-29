<?php

// Page reservée uniquement aux utilisateurs connectés
authenticationRequired();

require 'sql/category.sql.php';
require 'sql/post.sql.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération de la date du jour
    $today = date("Y-m-d H:i:s");

    // Génération du slug
    $slug = slug($_POST['title']);
    $isAdded = addPost($_POST, $today, $slug, $_SESSION['user']['id'] );

    if ($isAdded) {
        set_flash_message("Votre article est enregistré !");
    } else {
        set_flash_message("Une erreur est survenue !", "danger");
    }

    header('Location: index.php');
    exit;

}

$title = "Proposer un article";
$title_h1 = "Proposer un article";
$categories = getAllCategories();

require 'template/addpost.tpl.php';