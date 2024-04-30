<?php
require 'sql/user.sql.php';

authenticationRequired();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // On update le user dans la BD avec les infos du form
    $user = updateUser($pdo, $_POST);

    // On met à jour les données dans la SESSION
    $_SESSION['user']['firstName'] = $_POST['firstName'];
    $_SESSION['user']['lastName'] = $_POST['lastName'];
    $_SESSION['user']['phone'] = $_POST['phone'];

    set_flash_message("Votre profil a été mis à jour !");
    // On redirige vers la page profil
    header('Location: index.php?page=profil');
    exit;
}

$headerTitle = 'Mon profil !';

// On retrouve dans la BD le user qui est dans la SESSION
$user = getOneUser($pdo, $_SESSION['user']['id']);

// On affiche des données du user dans un form
require 'template/profil.tpl.php';
