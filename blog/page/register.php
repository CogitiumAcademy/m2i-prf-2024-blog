<?php

//var_dump($_SERVER); exit;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $title = "Inscrivez-vous !";
    $title_h1 = "Inscrivez-vous !";
    $header_bg = "public/clean/assets/img/contact-bg.jpg";

    require("template/register.tpl.php");
} else {
    //var_dump($_POST);
    if (!isset($_POST["firstname"]) || $_POST["firstname"] == "") {
        die("Prénom obligatoire !");
    }
    // Ajouter tous les autres tests

    $hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //die($hashPassword);
    $_POST["password"] = $hashPassword;

    require("sql/user.sql.php");
    $retour = registerUser($pdo, $_POST);

    header("Location:?page=login");
    exit;
}
