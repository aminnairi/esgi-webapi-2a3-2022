<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function updateArticleById($id, $data)
{
    $databaseConnection = getDatabaseConnection();

    $set = [];

    $allowedKeys = [
        "title",
        "body",
        "user_id",
    ];

    foreach ($data as $key => $value) {
        if (in_array($key, $allowedKeys)) {
            $set[] = "$key = :$key";
        }
    }

    $set = implode(", ", $set);

    $query = $databaseConnection->prepare("UPDATE articles SET $set WHERE id = :id");

    $query->execute(array_merge($data, ["id" => $id]));
}
