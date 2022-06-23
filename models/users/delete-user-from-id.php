<?php

require_once __DIR__ . "/../../library/get-database-connection.php";

function deleteUserFromId($id)
{
    $databaseConnection = getDatabaseConnection();

    $query = $databaseConnection->prepare("DELETE FROM users WHERE id = :id");

    $query->execute(["id" => $id]);
}
