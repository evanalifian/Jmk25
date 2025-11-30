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

use Dom\Comment;
use Jmk25\App\Router;


// Middlewares
use Jmk25\Middlewares\IsAuthMiddleware;
use Jmk25\Middlewares\IsNotAuthMiddleware;

// COntrollers
use Jmk25\Controllers\HomeController;
use Jmk25\Controllers\UserController;
use Jmk25\Controllers\PostController;
use Jmk25\Controllers\ProfileController;
use Jmk25\Controllers\BookmarkController;
use Jmk25\Controllers\CommentController;
use Jmk25\Controllers\LandingPageController;
use Jmk25\Controllers\LikesController;
use Jmk25\Controllers\GroupController;


// User path routes
Router::add("GET", "/user/signup", UserController::class, "renderSignup", [IsAuthMiddleware::class]);
Router::add("POST", "/user/signup", UserController::class, "register", [IsAuthMiddleware::class]);
Router::add("GET", "/user/signin", UserController::class, "renderSignin", [IsAuthMiddleware::class]);
Router::add("POST", "/user/signin", UserController::class, "login", [IsAuthMiddleware::class]);
Router::add("GET", "/user/logout", UserController::class, "logout");


// Landing page route
Router::add("GET", "/", LandingPageController::class, "index", [IsAuthMiddleware::class]);
Router::add("GET", "/dashboard", HomeController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("GET", "/profile", ProfileController::class, "profile", [IsNotAuthMiddleware::class]);
// Router::add("GET", "/", HomeController::class, "landing");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");

// Post routes
Router::add("GET", "/create", PostController::class, "renderCreate"); // Menampilkan form
Router::add("POST", "/store", PostController::class, "store");  // Menyimpan data
Router::add("GET", "/group/group_display", GroupController::class, "renderDetail");// Menampilkan halaman detail grup

// fitur join
Router::add("POST", "/group/join", GroupController::class, "join");

// Tambahkan baris ini
Router::add("GET", "/explore", GroupController::class, "renderExplore");

// follow
Router::add("POST", "/user/follow", UserController::class, "follow");
// keluar grub
Router::add("POST", "/group/leave", GroupController::class, "leave");

// kick member
// Tambahkan baris ini
Router::add("POST", "/group/kick", GroupController::class, "kickMember");

// Bookmark route
Router::add("POST", "/bookmark/toggle", BookmarkController::class, "toggle", [IsNotAuthMiddleware::class]);
Router::add("GET", "/bookmark", BookmarkController::class, "index", [IsNotAuthMiddleware::class]);

// likes
Router::add("POST", "/like/toggle", LikesController::class, "toggle", [IsNotAuthMiddleware::class]);

// comments
// Router::add("GET", "/post/detail", CommentController::class, "detail", [IsNotAuthMiddleware::class]);

// Eksekusi route yang dituju
Router::run();