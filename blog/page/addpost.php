<?php

// Page reservée uniquement aux utilisateurs connectés
authenticationRequired();

require 'sql/post.sql.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

}

$title = "Proposer un article";
$title_h1 = "Proposer un article";

require 'template/addpost.tpl.php';