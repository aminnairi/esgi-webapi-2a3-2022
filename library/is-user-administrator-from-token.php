<?php

require_once __DIR__ . "/../models/users/get-user-by-token.php";

function isUserAdministratorFromToken($token)
{
    $user = getUserByToken($token);

    return $user && $user["role"] === "ADMINISTRATOR";
}
