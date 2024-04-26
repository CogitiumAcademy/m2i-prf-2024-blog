<?php

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