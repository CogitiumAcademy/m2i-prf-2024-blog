<?php

//$title = "Un super article !";
//$title_h1 = "Un super article !";
//$subheading = "Le meilleur des articles du site";
//$header_bg = "post-bg.jpg";

if (isset($_GET["slug"])) {
    $slug = $_GET["slug"];
    require("sql/post.sql.php");
    $post = getOnePostBySlug($pdo, $slug);
    if (!$post) {
        die("Slug inexistant !");
    }
    //var_dump($post); exit;
    
    $title = $post["title"];
    $title_h1 = $post["title"];
    $subheading = "Rédigé par " . $post['firstName'] . " " . $post['lastName'] . " le " . $post['createdAt'] . "<br>Classé dans " . $post['name'];
    $header_bg = $post["image"];

    require("sql/comment.sql.php");
    $comments = getAllCommentsByPost($pdo, $post["id"]);
    //var_dump($comments); exit;

    require("template/post.tpl.php");
} else {
    die("Paramètre manquant !");
}

