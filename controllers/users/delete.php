<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $id = 1;
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->prepare("DELETE FROM users WHERE id = :id");

    $query->execute([
        "id" => $id
    ]);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

