<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class UserModel {
  public static function conn() {
    return Database::getConnectionDB();
  } 
  
  public static function register($username, $password){
    $statement = self::conn()->prepare("INSERT INTO user(username, user_password) VALUES (?, ?)");
    $statement->execute([
      $username,
      $password
    ]);
  }
}