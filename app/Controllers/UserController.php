<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;

class UserController {
  public static function renderSignIn() {
    View::render("/user/signin", [
      "title" => "Sign Up",
      "description" => "Sign in dulu bro kalom belom!!"
    ]);
  }
  
  public static function renderSignUp() {
    View::render("/user/signup", [
      "title" => "Sign Up",
      "description" => "Bikin akun dulu gak sih broo!!"
    ]);
  }
}