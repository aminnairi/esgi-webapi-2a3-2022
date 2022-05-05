<?php

function getJsonBody() {
    $rawBody = file_get_contents("php://input");
    $json = json_decode($rawBody, true);

    return $json;
}
