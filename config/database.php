<?php

function getConfigDB(): array {
  return [
    "database" => [
      "dev" => [
        "path" => "mysql:host=localhost:3306;dbname=jmk25",
        "username" => "root",
        "password" => ""
      ],
      "prod" => [
        "path" => "mysql:host=localhost:3306;dbname=jmk25",
        "username" => "root",
        "password" => ""
      ]
    ]
  ];
}