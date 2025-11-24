<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Config\Database;
use Jmk25\Exception\ValidationException;
use Jmk25\Models\UserModel;
use Jmk25\Service\UserService;

class UserController {
  public static function conn() {
    return Database::getConnectionDB();
  }

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
    $user_display = trim(htmlspecialchars($_POST["user_display"]));
    $email = trim(htmlspecialchars($_POST["email"]));

    try {
      UserModel::findUser($username);
      UserService::validateRegister($username, $password);
      UserModel::register($username, $user_display, $email, $password);
      View::redirect("/user/signin");
    } catch (ValidationException $err) {
      View::render("user/signup", [
        "title" => "Gagal Register",
        "err_msg" => $err->getMessage()
      ]);
    }
  }

  public function login() {
    $username = trim(htmlspecialchars($_POST["username"]));
    $password = trim(htmlspecialchars($_POST["password"]));

    try {
      UserService::validateRegister($username, $password);

      $statement = self::conn()->prepare("SELECT * FROM user WHERE username = ?");
      $statement->execute([$username]);

      $hash_password = "";
      $id_user = "";
      foreach ($statement as $s) {
        $hash_password = $s["user_password"];
        $id_user = $s["id"];
      }
      if (md5($password) != $hash_password) {
        throw new ValidationException("Password salah");
      } else {
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        $_SESSION["login"] = [
          "login" => true,
          "id_user" => $id_user,
        ];
        View::redirect("/");
      }
    } catch (ValidationException $err) {
      View::render("user/signin", [
        "title" => "Sign in",
        "err_msg" => $err->getMessage()
      ]);
    }
  }

  public function logout() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    session_unset();
    View::redirect("/user/signin");
  }
}