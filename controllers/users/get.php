<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../models/users/get-users.php";

try {
    $users = getUsers();

    jsonResponse(200, [], ["success" => true, "users" => $users]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

