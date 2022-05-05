<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";
require __DIR__ . "/../../library/get-json-body.php";

try {
    $json = getJsonBody();
    $allowedKeys = ["firstname", "lastname", "email", "password", "role"];
    $set = [];

    foreach ($json as $key => $value) {
        if (in_array($key, $allowedKeys)) {
            $set[] = "$key = :$key";
        }
    }

    $set = implode(", ", $set);
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->prepare("UPDATE users SET $set WHERE id = :id");
    $query->execute($json);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

