<?php

require 'sql/user.sql.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // var_dump($_POST); exit;

    // 1. Récupération de l'utilisateur dans la base
    $user = loginUser($_POST['email']);
    //var_dump($user); exit;
    
    // Version pédagogique
    if (!$user) {
        set_flash_message("Email inconnu", "danger");
    }

    // 2. Vérification du mot de passe
    if (password_verify($_POST['password'], $user['password'])) {
        //die('OK');

        // 3. Stockage de l'utilisateur en session
        $_SESSION['user'] = $user;

        $today = date("Y-m-d H:i:s");
        setcookie("Connected", $today, time() + 30);

        // 4. Notification Flash, Flash Messages, ...
        set_flash_message("Connexion réussie", "success");

        // 5. Redirection sur la page d'accueil
        header('Location: index.php');
        exit;
    }

    // die('NOK');
    set_flash_message("Connexion impossible, vérifier email / password", "danger");
    //var_dump($_SESSION); exit;
    header('Location: index.php?page=login');
    exit;


}

$title = "Connectez-vous !";
$title_h1 = "Connectez-vous !";

require 'template/login.tpl.php';