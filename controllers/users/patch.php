<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();

    $id = 4;
    $email = "email@domain.com";
    $firstname = "firstname";
    $lastname = "lastname";
    $role = "USER";
    $password = "password";

    $query = $databaseConnection->prepare("UPDATE users SET email = :email, firstname = :firstname, lastname = :lastname, role = :role, password = :password WHERE id = :id");

    $query->execute([
        "id" => $id,
        "email" => $email,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "role" => $role,
        "password" => $password
    ]);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

