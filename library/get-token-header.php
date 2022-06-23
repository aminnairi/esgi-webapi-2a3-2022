<?php

function getTokenHeader()
{
    $headers = getallheaders();

    $token = $headers["token"] ?? "";

    return $token;
}
