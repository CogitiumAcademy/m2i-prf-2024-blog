<?php

function loginUser($email) {
    global $pdo;

    try {

        // Execution de ma requête SQL
        $query = "SELECT * FROM users WHERE email = :email";
        $cursor = $pdo->prepare($query);
        $cursor->bindValue(":email", $email, PDO::PARAM_STR);
        $cursor->execute();

        // Récupération de l'utilisateur
        $user = $cursor->fetch();
        //var_dump($user); exit;

        // On retourne l'utilisateur trouvé dans la base
        return $user;

    } catch (PDOException $e) {
        // En cas d'erreur, on affiche un petit message
        die("Erreur SQL : " . $e->getMessage());
    }

}

function registerUser($pdo, $user) {
    try {
        // SQL statement (déclaration)
        $query = 
        "INSERT INTO `users` 
            (`lastName`, `firstName`, `email`, `phone`, `password`, `role`) 
        VALUES 
            (:lastname, :firstname, :email, :phone, :password, 'ROLE_USER');";

        $cursor = $pdo->prepare($query);
        $cursor->bindValue(':lastname', $user["lastname"], PDO::PARAM_STR);
        $cursor->bindValue(':firstname', $user["firstname"], PDO::PARAM_STR);
        $cursor->bindValue(':email', $user["email"], PDO::PARAM_STR);
        $cursor->bindValue(':phone', $user["phone"], PDO::PARAM_STR);
        $cursor->bindValue(':password', $user["password"], PDO::PARAM_STR);
        $cursor->execute();
        
        return true;
       
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

function getOneUser($pdo, $id) {

    try {
        $query = 
        "SELECT * 
            FROM `users` 
            WHERE `id` = :id";
        $cursor = $pdo->prepare($query);
        $cursor->bindValue(':id', $id, PDO::PARAM_INT);
        $cursor->execute();
        
        $user = $cursor->fetch();
        return $user;
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
}

function updateUser($pdo, $user) {

    try {
        $query = 
        "UPDATE `users` 
        SET 
            `lastName` = :lastName, 
            `firstName` = :firstName,
            `phone` = :phone 
        WHERE `id` = :id";

        $cursor = $pdo->prepare($query);
        $cursor->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
        $cursor->bindParam(':lastName', $user['lastName'], PDO::PARAM_STR);
        $cursor->bindParam(':firstName', $user['firstName'], PDO::PARAM_STR);
        $cursor->bindParam(':phone', $user['phone'], PDO::PARAM_STR);
        $cursor->execute();
        
        return TRUE;
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
}

function updatePassword($pdo, $id, $new_password) {

    try {
        $query = 
        "UPDATE `users` 
        SET 
            `password` = :password
        WHERE `id` = :id";

        $cursor = $pdo->prepare($query);
        $cursor->bindParam(':id', $id, PDO::PARAM_INT);
        $cursor->bindParam(':password', $new_password, PDO::PARAM_STR);
        $cursor->execute();

        return TRUE;
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
}