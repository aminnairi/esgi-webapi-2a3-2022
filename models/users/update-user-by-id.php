<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function updateUserById($id, $data)
{
    $databaseConnection = getDatabaseConnection();

    $set = [];

    $allowedKeys = [
        "email",
        "firstname",
        "lastname",
        "role",
        "password",
        "token"
    ];

    foreach ($data as $key => $value) {
        if (in_array($key, $allowedKeys)) {
            $set[] = "$key = :$key";
        }
    }

    $set = implode(", ", $set);

    $query = $databaseConnection->prepare("UPDATE users SET $set WHERE id = :id");

    $query->execute(array_merge($data, ["id" => $id]));
}
