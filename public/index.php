<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Jmk25\App\Router;
use Jmk25\Controllers\LandingPageController;

// Landing Page
Router::add("GET", "/", LandingPageController ::class, "index");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");

Router::run();