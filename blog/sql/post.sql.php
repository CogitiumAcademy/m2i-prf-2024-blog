<?php

function getAllPosts($pdo) {
    try {
        // SQL statement (déclaration)
        $query = 
        "SELECT `title`, LEFT(content, " . POST_TRUNCATE . "), `createdAt`, `lastName`, `firstName`, `name` 
            FROM `posts` A
            INNER JOIN `users` B ON A.id_users = B.id
            INNER JOIN `categories` C ON A.id_categories = C.id
            WHERE `active` = 1
            ORDER BY `updatedAt` DESC;";
        $cursor = $pdo->query($query);
        
        //Récupération
        $posts = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
       
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}