<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-json-body.php";
require __DIR__ . "/../../models/users/update-user-by-id.php";
require __DIR__ . "/../../library/get-token-header.php";
require __DIR__ . "/../../library/is-user-administrator-from-token.php";

try {
    $token = getTokenHeader();

    if (!isUserAdministratorFromToken($token)) {
        jsonResponse(401, [], ["success" => false, "error" => "Unauthorized"]);

        die();
    }

    $json = getJsonBody();

    updateUserById($json["id"], $json);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

