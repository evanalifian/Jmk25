<?php

/**
 * Memanggil semua library composer pada autoload.php
 */
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . '/../app/helpers/func.php';

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
use Jmk25\Controllers\ProfileController;
use Jmk25\Controllers\BookmarkController;
use Jmk25\Controllers\CommentController;
use Jmk25\Controllers\CreateGroupController;
use Jmk25\Controllers\EditProfileController;
use Jmk25\Controllers\LandingPageController;
use Jmk25\Controllers\LikesController;
use Jmk25\Controllers\GroupController;
use Jmk25\Controllers\PostContentController;
use Jmk25\Controllers\ShareController;

// User path routes
Router::add("GET", "/user/signup", UserController::class, "renderSignup", [IsAuthMiddleware::class]);
Router::add("POST", "/user/signup", UserController::class, "register", [IsAuthMiddleware::class]);
Router::add("GET", "/user/signin", UserController::class, "renderSignin", [IsAuthMiddleware::class]);
Router::add("POST", "/user/signin", UserController::class, "login", [IsAuthMiddleware::class]);
Router::add("GET", "/user/logout", UserController::class, "logout");

// Landing page route
Router::add("GET", "/", HomeController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("GET", "/landing", LandingPageController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("GET", "/dashboard", HomeController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("GET", "/profile", ProfileController::class, "profile", [IsNotAuthMiddleware::class]);
// Router::add("GET", "/", HomeController::class, "landing");
// Router::add("GET", "/([0-9a-zA-Z]*)/id/([0-9a-zA-Z]*)", HomeController::class, "index");

// Post routes
Router::add("GET", "/upload", PostContentController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("POST", "/store", PostContentController::class, "store", [IsNotAuthMiddleware::class]);

// fitur join
Router::add("GET", "/explore", GroupController::class, "renderExplore");

// follow
Router::add("POST", "/user/follow", UserController::class, "follow");
// display follow
Router::add('GET', '/follows/following', GroupController::class, 'following');
Router::add('GET', '/follows/followers', GroupController::class, 'followers');

// Group
Router::add("POST", "/group/leave", GroupController::class, "leave");
Router::add("GET", "/group", GroupController::class, "renderDetail");
Router::add("POST", "/group/join", GroupController::class, "join");
Router::add("GET", "/group/create", CreateGroupController::class, "index", [IsNotAuthMiddleware::class]);
Router::add("POST", "/group/create", CreateGroupController::class, "postCreateGroup", [IsNotAuthMiddleware::class]);

// kick member
Router::add("POST", "/group/kick", GroupController::class, "kickMember");

//edit user
Router::add("GET", "/user/edit", EditProfileController::class, "renderEdit", [IsNotAuthMiddleware::class]);
Router::add("POST", "/user/update", EditProfileController::class, "update", [isNotAuthMiddleware::class]);

// kick member
// Tambahkan baris ini
Router::add("POST", "/group/kick", GroupController::class, "kickMember");

// Bookmark route
Router::add("POST", "/bookmark/toggle", BookmarkController::class, "toggle", [IsNotAuthMiddleware::class]);
Router::add("GET", "/bookmark", BookmarkController::class, "index", [IsNotAuthMiddleware::class]);

// likes
Router::add("POST", "/like/toggle", LikesController::class, "toggle", [IsNotAuthMiddleware::class]);

// comments
Router::add('GET', '/([0-9]+)', CommentController::class, 'index');
Router::add('POST', '/comment/store', CommentController::class, 'store');

// profile
Router::add('GET', '/profile', ProfileController::class, 'profile'); 
Router::add('GET', '/([a-z0-9_-]+)', ProfileController::class, 'profile');

// share
Router::add('POST', '/share', ShareController::class, 'track');

// Eksekusi route yang dituju
Router::run();