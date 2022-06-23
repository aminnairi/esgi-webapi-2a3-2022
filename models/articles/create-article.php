<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function createArticle($article)
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->prepare("INSERT INTO articles(title, body, user_id) VALUES(:title, :body, :user_id)");

    $query->execute($article);
}
