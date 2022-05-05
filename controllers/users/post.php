<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $rawBody = file_get_contents("php://input");
    $json = json_decode($rawBody, true);
    $query = $databaseConnection->prepare("INSERT INTO users(email, firstname, lastname, role, password) VALUES(:email, :firstname, :lastname, :role, :password)");
    $query->execute($json);

    jsonResponse(201, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false]);
}
