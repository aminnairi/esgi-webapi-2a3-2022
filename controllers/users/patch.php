<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();

    $id = 1;
    $email = "email@domain.com";
    $firstname = "firstnamek";
    $lastname = "lastname";
    $role = "USER";
    $password = "password";

    $query = $databaseConnection->query("UPDATE users SET email = $email, firstname = $firstname, lastname = $lastname, role = $role, password = $password WHERE id = $id");

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

