<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../models/users/get-users.php";
require __DIR__ . "/../../models/users/get-user-by-token.php";

try {
    $users = getUsers();

    $headers = getallheaders();

    $tokenHeader = $headers["token"];

    $user = getUserByToken($tokenHeader);

    if (!$user || $user["role"] !== "ADMINISTRATOR") {
        jsonResponse(401, [], ["success" => false, "error" => "Unauthorized"]);

        die();
    }

    jsonResponse(200, [], ["success" => true, "users" => $users]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

