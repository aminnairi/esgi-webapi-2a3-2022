<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function createUser($user)
{
    $databaseConnection = getDatabaseConnection();
    $query = $databaseConnection->prepare("INSERT INTO users(email, firstname, lastname, role, password) VALUES(:email, :firstname, :lastname, :role, :password)");
    $user["password"] = password_hash($user["password"], PASSWORD_BCRYPT);
    $query->execute($user);
}
