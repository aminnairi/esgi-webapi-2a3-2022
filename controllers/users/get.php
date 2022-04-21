<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->query("SELECT * FROM users;");
    $users = $query->fetchAll();

    jsonResponse(200, [], ["success" => true, "users" => $users]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

