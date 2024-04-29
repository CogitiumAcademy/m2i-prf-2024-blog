<?php

/**
 * Permet de retourner toutes les catégories
 */
function getAllCategories() {

    global $pdo;

    try {
        $query = $pdo->query("SELECT * FROM categories");
        return $query->fetchAll();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}