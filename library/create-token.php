<?php

function createToken()
{
    $randomBytes = random_bytes(16);

    $token = bin2hex($randomBytes);

    return $token;
}
