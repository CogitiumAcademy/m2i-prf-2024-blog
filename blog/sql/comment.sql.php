<?php

function getAllCommentsByPost($pdo, $idPost) {
    try {
        // SQL statement (déclaration)
        $query = 
        "SELECT `content`, `createdAt`, `firstName`, `lastName` 
        FROM `comments` A
        INNER JOIN `users` B ON A.`id_users` = B.`id` 
        WHERE `id_posts` = :idPost;";
        $cursor = $pdo->prepare($query);
        $cursor->bindValue(':idPost', $idPost, PDO::PARAM_INT);
        $cursor->execute();
        
        //Récupération
        $comments = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
       
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}