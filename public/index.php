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

// Middlewares
use Jmk25\Middlewares\IsAuthMiddleware;
use Jmk25\Middlewares\IsNotAuthMiddleware;

// COntrollers
use Jmk25\Controllers\LandingPageController;
use Jmk25\Middlewares\AuthMiddleware;
use Jmk25\Controllers\HomeController;
use Jmk25\Controllers\UserController;
use Jmk25\Controllers\PostController;


// User path routes
Router::add("GET", "/user/signup", UserController::class, "renderSignup", [IsAuthMiddleware::class]);
Router::add("POST", "/user/signup", UserController::class, "register", [IsAuthMiddleware::class]);
Router::add("GET", "/user/signin", UserController::class, "renderSignin", [IsAuthMiddleware::class]);


// Landing page route
Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/landing", HomeController::class, "landing");
Router::add("GET", "/profile", HomeController::class, "profile");
// Router::add("GET", "/", HomeController::class, "landing");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");

// Post routes
Router::add("GET", "/create", PostController::class, "renderCreate"); // Menampilkan form
Router::add("POST", "/store", PostController::class, "store");  // Menyimpan data
// Halaman Notifikasi
Router::add("GET", "/notifications", PostController::class, "renderNotifications");

// Eksekusi route yang dituju
Router::run();