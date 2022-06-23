<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function getUserByToken($token)
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->prepare("SELECT * FROM users WHERE token = :token LIMIT 1;");

    $query->execute(["token" => $token]);

    $user = $query->fetch();

    return $user;
}
