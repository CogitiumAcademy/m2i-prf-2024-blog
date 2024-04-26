<?php

$subheading = "Un super blog de surf";

require('sql/post.sql.php');
$posts = getAllPosts($pdo);
//var_dump($posts); exit;

require("template/home.tpl.php");
