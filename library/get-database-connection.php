<?php

function getDatabaseConnection() {
    $driver = "mysql";

    $databaseName = "esgi-webapi-2a3-2022";

    $hostName = "localhost";

    $dataSourceName = "$driver:dbname=$databaseName;host=$hostName";

    $user = "root";

    $password = "root";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    return new PDO($dataSourceName, $user, $password, $options);
}
