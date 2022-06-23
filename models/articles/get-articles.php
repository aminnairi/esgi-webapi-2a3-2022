<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function getArticles()
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->query("SELECT * FROM articles");

    $articles = $query->fetchAll();

    return $articles;
}
