<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Exception\ValidationException;
use Jmk25\Models\UserModel;
use Jmk25\Service\UserService;

class UserController {
  public static function renderSignIn() {
    View::render("/user/signin", [
      "title" => "Sign Up",
      "description" => "Sign in dulu bro kalom belom!!",
      "hideSidebar" => true
    ]);
  }
  
  public static function renderSignUp() {
    View::render("/user/signup", [
      "title" => "Sign Up",
      "description" => "Bikin akun dulu gak sih broo!!",
      "hideSidebar" => true 
    ]);
  }

  public function register() {
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["password"]));

    try {
      UserService::validateRegister($username, $password);
      UserModel::register($username, $password);
      View::redirect("/user/signin");
    } catch (ValidationException $err) {
      View::render("/user/signup", [
        "title" => "Register new account",
        "err_msg" => $err->getMessage()
      ]);
    }
  }
}