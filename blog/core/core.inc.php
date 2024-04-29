<?php

/**
 * Permet de vérifier qu'un utilisateur est bien
 * connecté pour accéder à une page.
 */
function authenticationRequired() {
    if (!isset($_SESSION['user'])) {
        set_flash_message("Vous n'avez pas accès à cette page, vous devez être authentifié !", "danger");
        header("Location: index.php?page=login");
        exit;
    }
}

/**
 * Retourne 'vrai' si un utilisateur est connecté ;
 * 'faux' sinon.
 */
function isGranted() {
    return isset($_SESSION['user']);
}

/**
 * Permet de générer un slug à partir d'un string
 */
function slug($string) {
    // Convertir la chaîne en minuscules
    $string = strtolower($string);

    // Supprimer les caractères spéciaux et les accents
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);

    // Supprimer les tirets en début et fin de chaîne
    $string = trim($string, '-');

    return $string;
}