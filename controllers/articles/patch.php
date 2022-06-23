<?php

require_once __DIR__ . "/../../library/json-response.php";
require_once __DIR__ . "/../../library/get-token-header.php";
require_once __DIR__ . "/../../library/is-user-administrator-from-token.php";
require_once __DIR__ . "/../../library/get-json-body.php";
require_once __DIR__ . "/../../models/articles/update-article-by-id.php";

try {
    $token = getTokenHeader();

    if (!isUserAdministratorFromToken($token)) {
        jsonResponse(401, [], ["success" => false, "error" => "Unauthorized"]);

        die();
    }

    $json = getJsonBody();

    updateArticleById($json["id"], $json);

    jsonResponse(200, [], ["success" => true]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}
