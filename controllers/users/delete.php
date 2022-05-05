<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";
require __DIR__ . "/../../library/get-json-body.php";

try {
    $json = getJsonBody();
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->prepare("DELETE FROM users WHERE id = :id");
    $query->execute($json);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

