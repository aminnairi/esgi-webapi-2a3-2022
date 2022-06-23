<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function deleteArticleById($id)
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->prepare("DELETE FROM articles WHERE id = :id");

    $query->execute(["id" => $id]);
}
