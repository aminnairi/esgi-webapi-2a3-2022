<?php

require __DIR__ . "/../../library/json-response.php";

$users = [
    [
        "id" => 1,
        "email" => "anairi@esgi.fr",
        "firstname" => "Amin",
        "lastname" => "NAIRI",
        "role" => "ADMINISTRATOR",
        "password" => "password",
        "token" => "..."
    ]
];

jsonResponse(200, [], ["success" => true, "users" => $users]);
