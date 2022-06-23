<?php

function verifyPasswords($plainPassword, $hashedPassword)
{
    return password_verify($plainPassword, $hashedPassword);
}
