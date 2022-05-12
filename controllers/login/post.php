<?php

// À faire : générer une chaîne de caractères aléatoire (binaire)
// À faire : transformer la chaîne de caractères binaire en héxadécimal
// À faire : récupérer l'utilisateur en base de données
// À faire : vérifier que l'utilisateur existe
// À faire : vérifier que le mot de passe correspond
// À faire : stocker le token en base de données pour l'utilisateur
// À faire : renvoyer le token
// À faire : transformer les requêtes en BDD vers des modèles

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/get-json-body.php";
require __DIR__ . "/../../library/get-database-connection.php";

$randomBytes = random_bytes(16);

$token = bin2hex($randomBytes);

$databaseConnection = getDatabaseConnection();

$query = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1;");

$json = getJsonBody();

$query->execute([
    "email" => $json["email"]
]);

$user = $query->fetch();

if (!$user) {
    jsonResponse(400, [], ["success" => false, "error" => "Bad credentials"]);
    die();
}

$hashedPassword = $user["password"];
$plainPassword = $json["password"];

if (!password_verify($plainPassword, $hashedPassword)) {
    jsonResponse(400, [], ["success" => false, "error" => "Bad credentials"]);
    die();
}

$query = $databaseConnection->prepare("UPDATE users SET token = :token WHERE id = :id");

$query->execute(["id" => $user["id"], "token" => $token]);

jsonResponse(200, [], ["success" => true, "token" => $token]);
