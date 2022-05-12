<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";
require __DIR__ . "/../../library/get-json-body.php";

try {
    $json = getJsonBody();
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->prepare("INSERT INTO users(email, firstname, lastname, role, password) VALUES(:email, :firstname, :lastname, :role, :password)");
    $query->execute($json);

    jsonResponse(201, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}
