<?php

function getConfigDB(): array {
    return [
        "database" => [
            "dev" => [
                // Konfigurasi Langsung (Hardcode)
                "path" => "mysql:host=localhost;dbname=jmk25", // Ganti 'jmk25' jika nama DB beda
                "username" => "root",
                "password" => "" // Password default XAMPP/Laragon biasanya kosong
            ],
            "prod" => [
                "path" => "mysql:host=localhost;dbname=jmk25",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}