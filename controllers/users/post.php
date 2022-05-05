<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-database-connection.php";

try {
    $databaseConnection = getDatabaseConnection();

    $email = "anairi@esgi.fr";
    $firstname = "Amin";
    $lastname = "NAIRI";
    $role = "ADMINISTRATOR";
    $password = "password";

    $query = $databaseConnection->prepare("INSERT INTO users(email, firstname, lastname, role, password) VALUES(:email, :firstname, :lastname, :role, :password)");

    $query->execute([
        "email" => $email,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "role" => $role,
        "password" => $password
    ]);

    jsonResponse(201, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false]);
}
