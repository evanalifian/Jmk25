<?php

/**
 * Memanggil semua library composer pada autoload.php
 */
require_once __DIR__ . "/../vendor/autoload.php";


/**
 * Memanggil class Router untuk melakukan routing
 * Memanggil class Controller yang dibutuhkan untuk setiap halaman
 * Memanggil class Controller untuk middleware
 */
use Jmk25\App\Router;
use Jmk25\Middlewares\AuthMiddleware;
use Jmk25\Controllers\LandingPageController;
use Jmk25\Controllers\UserController;


// User path routes
Router::add("GET", "/user/signin", UserController::class, "renderSignin");
Router::add("GET", "/user/signup", UserController::class, "renderSignup");


// Landing page route
Router::add("GET", "/", LandingPageController::class, "index");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");


// Eksekusi route yang dituju
Router::run();