<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-json-body.php";
require __DIR__ . "/../../models/users/get-user-by-token.php";
require __DIR__ . "/../../models/users/update-user-by-id.php";

try {
    $json = getJsonBody();

    $user = getUserByToken($json["token"]);

    if (!$user) {
        jsonResponse(404, [], ["success" => false, "error" => "User not found"]);

        die();
    }

    updateUserById($user["id"], ["token" => null]);
    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}
