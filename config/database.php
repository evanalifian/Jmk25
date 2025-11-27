<?php

function getConfigDB(): array {
    return [
        "database" => [
            "dev" => [
                // Mengambil nilai dari .env
                "path" => "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'),
                "username" => getenv('DB_USER'),
                "password" => getenv('DB_PASS')
            ],
            "prod" => [
                // Biasanya prod punya env sendiri, tapi logikanya sama
                "path" => "mysql:host=" . getenv('PROD_DB_HOST') . ";dbname=" . getenv('PROD_DB_NAME'),
                "username" => getenv('PROD_DB_USER'),
                "password" => getenv('PROD_DB_PASS')
            ]
        ]
    ];
}