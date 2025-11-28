<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use Jmk25\Exception\ValidationException;

class UserModel {
  public static function conn() {
    return Database::getConnectionDB();
  } 

  public static function findUser($username) {
    $statement = self::conn()->prepare("SELECT username FROM user WHERE username = ?");
    $statement->execute([$username]);
    
    foreach ($statement as $s) {
      throw new ValidationException("Username sudah tersedia");
    }
  }
  
  public static function register($username, $user_display, $email, $password){
    $statement = self::conn()->prepare("INSERT INTO user(username, user_display, user_email, user_password) VALUES (?, ?, ?, ?)");
    $statement->execute([
      $username,
      $user_display,
      $email,
      md5($password)
    ]);
  }
  public static function getAllUsers() {
    $sql = "SELECT id, username, user_display, user_pict FROM user ORDER BY user_created_at DESC LIMIT 10";
    
    $statement = self::conn()->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_ASSOC);
  }
  public static function followUser($followerId, $followingId) {
    // 1. Cek dulu apakah sudah follow (agar tidak duplikat)
    $check = self::conn()->prepare("SELECT id_follow FROM follow WHERE follow_id_followers = ? AND follow_id_following = ?");
    $check->execute([$followerId, $followingId]);
    
    if ($check->rowCount() > 0) {
        return false; // Sudah follow, jangan insert lagi
    }

    // 2. Jika belum, lakukan Insert
    $sql = "INSERT INTO follow (follow_id_followers, follow_id_following) VALUES (?, ?)";
    $stmt = self::conn()->prepare($sql);
    
    return $stmt->execute([$followerId, $followingId]);
  }

  public static function isFollowing($followerId, $followingId) {
    $sql = "SELECT id_follow FROM follow WHERE follow_id_followers = ? AND follow_id_following = ?";
    $stmt = self::conn()->prepare($sql);
    $stmt->execute([$followerId, $followingId]);
    
    // Jika ada baris data, berarti sudah follow (return true)
    return $stmt->rowCount() > 0;
  }
}
