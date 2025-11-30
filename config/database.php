<?php

function getConfigDB(): array
{
    $devHost = getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost';
    $devDb   = getenv('DB_NAME') ? getenv('DB_NAME') : 'jmk25';
    $devUser = getenv('DB_USER') ? getenv('DB_USER') : 'root';
    $devPass = getenv('DB_PASS') ? getenv('DB_PASS') : ''; 


    $prodHost = getenv('PROD_DB_HOST') ? getenv('PROD_DB_HOST') : 'localhost';
    $prodDb   = getenv('PROD_DB_NAME') ? getenv('PROD_DB_NAME') : ''; 
    $prodUser = getenv('PROD_DB_USER') ? getenv('PROD_DB_USER') : ''; 
    $prodPass = getenv('PROD_DB_PASS') ? getenv('PROD_DB_PASS') : '';

    return [
        "database" => [
            "dev" => [
                "path" => "mysql:host=" . $devHost . ";dbname=" . $devDb,
                "username" => $devUser,
                "password" => $devPass
            ],
            "prod" => [
                "path" => "mysql:host=" . $prodHost . ";dbname=" . $prodDb,
                "username" => $prodUser,
                "password" => $prodPass
            ]
        ]
    ];
}