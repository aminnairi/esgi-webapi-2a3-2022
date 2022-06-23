<?php

// À faire : générer une chaîne de caractères aléatoire (binaire)
// À faire : transformer la chaîne de caractères binaire en héxadécimal
// À faire : récupérer l'utilisateur en base de données
// À faire : vérifier que l'utilisateur existe
// À faire : vérifier que le mot de passe correspond
// À faire : stocker le token en base de données pour l'utilisateur
// À faire : renvoyer le token
// À faire : transformer les requêtes en BDD vers des modèles

require_once __DIR__ . "/../../library/json-response.php";
require_once __DIR__ . "/../../library/get-json-body.php";
require_once __DIR__ . "/../../models/users/get-user-by-email.php";
require_once __DIR__ . "/../../models/users/update-user-by-id.php";
require_once __DIR__ . "/../../library/create-token.php";
require_once __DIR__ . "/../../library/verify-passwords.php";

try {
    $json = getJsonBody();

    $user = getUserByEmail($json["email"]);

    if (!$user) {
        jsonResponse(400, [], ["success" => false, "error" => "Bad credentials"]);
        die();
    }

    $hashedPassword = $user["password"];

    $plainPassword = $json["password"];

    if (!verifyPasswords($plainPassword, $hashedPassword)) {
        jsonResponse(400, [], ["success" => false, "error" => "Bad credentials"]);
        die();
    }

    $token = createToken();

    updateUserById($user["id"], ["token" => $token]);

    jsonResponse(200, [], ["success" => true, "token" => $token]);
} catch (PDOException $exception) {
    jsonResponse(500, [], ["success" => false, "error" => $exception->getMessage()]);
}

