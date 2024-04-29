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
