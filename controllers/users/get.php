<?php

require __DIR__ . "/../../library/json-response.php";

$users = [];

jsonResponse(200, [], ["success" => true, "users" => $users]);
