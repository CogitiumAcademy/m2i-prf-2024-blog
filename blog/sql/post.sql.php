<?php

function addPost($post, $today, $slug, $idUser)
{
    global $pdo;
    try{
        $query =
            "INSERT INTO `posts`
            (`title`, `content`, `createdAt`, `updatedAt`, `image`, `active`, `slug`, `id_users`, `id_categories`)
        VALUES
            (:title, :content, '$today', '$today', :image, FALSE, :slug, $idUser, :id_categories)";

        $cursor = $pdo->prepare($query);
        $cursor->bindValue(':title', $post['title'], PDO::PARAM_STR);
        $cursor->bindValue(':content', $post['content'], PDO::PARAM_STR);
        $cursor->bindValue(':image', $post['image'], PDO::PARAM_STR);
        $cursor->bindValue(':slug', $slug, PDO::PARAM_STR);
        $cursor->bindValue(':id_categories', $post['category'], PDO::PARAM_INT);
        $cursor->execute();

        return TRUE;

    } catch (PDOException $e) {
        //die($e->getMessage());
        return FALSE;
    }

}

function getAllPosts($pdo) {
    try {
        // SQL statement (déclaration)
        $query = 
        "SELECT `title`, A.`slug`, LEFT(content, " . POST_TRUNCATE . ") AS content, `createdAt`, `image`, `lastName`, `firstName`, `name` 
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

function getOnePostBySlug($pdo, $slug) {
    try {
        // SQL statement (déclaration)
        $query = 
        "SELECT A.`id`, `title`, `content`, `createdAt`, `image`, `lastName`, `firstName`, `name` 
            FROM `posts` A
            INNER JOIN `users` B ON A.id_users = B.id
            INNER JOIN `categories` C ON A.id_categories = C.id
            WHERE active = 1
                AND A.`slug` = :slug;";
        $cursor = $pdo->prepare($query);
        $cursor->bindValue(':slug', $slug, PDO::PARAM_STR);
        $cursor->execute();
        
        //Récupération
        $post = $cursor->fetch(PDO::FETCH_ASSOC);
        return $post;
       
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}