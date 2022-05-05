<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->query("INSERT INTO users(email, firstname, lastname, role, password) VALUES('anairi@esgi.fr', 'Amin', 'NAIRI', 'ADMINISTRATOR', 'password')");

    jsonResponse(201, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false]);
}
