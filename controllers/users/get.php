<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../models/users/get-users.php";
require __DIR__ . "/../../library/is-user-administrator-from-token.php";
require __DIR__ . "/../../library/get-token-header.php";

try {
    $token = getTokenHeader();

    if (!isUserAdministratorFromToken($token)) {
        jsonResponse(401, [], ["success" => false, "error" => "Unauthorized"]);

        die();
    }

    $users = getUsers();

    jsonResponse(200, [], ["success" => true, "users" => $users]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

