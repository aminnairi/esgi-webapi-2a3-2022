<?php

require __DIR__ . "/../../library/get-database-connection.php";

function getUserByEmail($email)
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1;");

    $query->execute(["email" => $email]);

    $user = $query->fetch();

    return $user;
}
