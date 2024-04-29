<?php

require 'sql/user.sql.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // var_dump($_POST); exit;

    // 1. Récupération de l'utilisateur dans la base
    $user = loginUser($_POST['email']);
    //var_dump($user); exit;

    // 2. Vérification du mot de passe
    if (password_verify($_POST['password'], $user['password'])) {
        //die('OK');

        // 3. Stockage de l'utilisateur en session
        $_SESSION['user'] = $user;

        // TODO 4. CHALLENGE : Notification Flash

        // 5. Redirection sur la page d'accueil
        header('Location: index.php');
        exit;
    }

    // die('NOK');
    header('Location: index.php?page=login');
    exit;


}

$title = "Connectez-vous !";
$title_h1 = "Connectez-vous !";

require 'template/login.tpl.php';