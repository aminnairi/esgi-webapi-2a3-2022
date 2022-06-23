<?php

/**
 * Permet de modifier la configuration de PHP
 *
 * @see https://www.php.net/manual/en/function.ini-set.php
 */
ini_set("display_errors", 1);

/**
 * Permet d'éviter que les erreurs, avertissements et autres soient masqués
 *
 * @see https://www.php.net/manual/en/function.error-reporting.php
 */
error_reporting(E_ALL);

/**
 * La route ré-écrite via la règle de ré-écriture d'URL du fichier .htaccess
 *
 * @see https://www.php.net/manual/en/language.operators.comparison.php
 * @see https://www.php.net/manual/en/function.isset.php
 * @see https://www.php.net/manual/en/reserved.variables.request.php
 */
$route = isset($_REQUEST["route"]) ? $_REQUEST["route"] : "undefined";

/**
 * Récupère la méthode HTTP de la requête faite au serveur
 *
 * @see https://www.php.net/manual/en/reserved.variables.server.php
 */
$method = $_SERVER["REQUEST_METHOD"];

if ($route === "login" && $method === "POST") {
    include __DIR__ . "/controllers/login/post.php";

    die();
}

if ($route === "logout" && $method === "POST") {
    include __DIR__ . "/controllers/logout/post.php";

    die();
}

if ($route === "users") {
    if ($method === "GET") {
        /**
         * Inclu le fichier et lève une erreur si le chemin est introuvable
         *
         * @see https://www.php.net/manual/en/function.require.php
         */
        include __DIR__ . "/controllers/users/get.php";

        /**
         * Met fin à l'exécution du script à l'endroit où cette fonction est appelée
         *
         * @see https://www.php.net/manual/en/function.die.php
         */
        die();
    }

    if ($method === "POST") {
        /**
         * Inclu le fichier et lève une erreur si le chemin est introuvable
         *
         * @see https://www.php.net/manual/en/function.require.php
         */
        include __DIR__ . "/controllers/users/post.php";

        /**
         * Met fin à l'exécution du script à l'endroit où cette fonction est appelée
         *
         * @see https://www.php.net/manual/en/function.die.php
         */
        die();
    }

    if ($method === "PATCH") {
        /**
         * Inclu le fichier et lève une erreur si le chemin est introuvable
         *
         * @see https://www.php.net/manual/en/function.require.php
         */
        include __DIR__ . "/controllers/users/patch.php";

        /**
         * Met fin à l'exécution du script à l'endroit où cette fonction est appelée
         *
         * @see https://www.php.net/manual/en/function.die.php
         */
        die();
    }

    if ($method === "DELETE") {
        /**
         * Inclu le fichier et lève une erreur si le chemin est introuvable
         *
         * @see https://www.php.net/manual/en/function.require.php
         */
        include __DIR__ . "/controllers/users/delete.php";

        /**
         * Met fin à l'exécution du script à l'endroit où cette fonction est appelée
         *
         * @see https://www.php.net/manual/en/function.die.php
         */
        die();
    }
}

require __DIR__ . "/library/json-response.php";

jsonResponse(404, [], ["success" => false, "error" => "Route not found"]);
