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
use Jmk25\Controllers\HomeController;
use Jmk25\Controllers\UserController;


// User path routes
Router::add("GET", "/signin", UserController::class, "renderSignin");
Router::add("GET", "/signup", UserController::class, "renderSignup");


// Landing page route
Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/landing", HomeController::class, "landing");
Router::add("GET", "/profile", HomeController::class, "profile");
// Router::add("GET", "/", HomeController::class, "landing");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");


// Eksekusi route yang dituju
Router::run();