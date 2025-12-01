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
    $sql = "SELECT id, username, user_display, user_pict FROM user";
    $statement = self::conn()->prepare($sql);
    $statement->execute();
    $allUsers = $statement->fetchAll(\PDO::FETCH_ASSOC);

    $totalData = count($allUsers);
    if ($totalData === 0) {
        return [];
    }
    $limit = 6;

    if ($totalData <= $limit) {
        shuffle($allUsers); 
        return $allUsers;
    }
    $randomUsers = [];
    $usedIndices = [];
    while (count($randomUsers) < $limit) {
        $randomIndex = random_int(0, $totalData - 1);        
        if (!in_array($randomIndex, $usedIndices)) {
            
            $randomUsers[] = $allUsers[$randomIndex];
            $usedIndices[] = $randomIndex; 
        }
    }

    return $randomUsers;
}
  public static function followUser($followerId, $followingId) {
    $check = self::conn()->prepare("SELECT id_follow FROM follow WHERE follow_id_followers = ? AND follow_id_following = ?");
    $check->execute([$followerId, $followingId]);
    
    if ($check->rowCount() > 0) {
        return false; 
    }

    $sql = "INSERT INTO follow (follow_id_followers, follow_id_following) VALUES (?, ?)";
    $stmt = self::conn()->prepare($sql);
    

    return $stmt->execute([$followerId, $followingId]);
  }

  public static function isFollowing($followerId, $followingId) {
    $sql = "SELECT id_follow FROM follow WHERE follow_id_followers = ? AND follow_id_following = ?";
    $stmt = self::conn()->prepare($sql);
    $stmt->execute([$followerId, $followingId]);
    
    
    return $stmt->rowCount() > 0;
  }

  public static function getExploreUser($chars) {
        $sql = "SELECT * FROM user 
                WHERE username LIKE :c 
                OR user_display LIKE :c
        ";

        $statement = self::conn()->prepare($sql);
        $statement->execute([
            ':c' => "%$chars%"
        ]);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
  // Tambahkan ini di dalam class UserModel
  public static function unfollowUser($followerId, $followingId) {
    $sql = "DELETE FROM follow WHERE follow_id_followers = ? AND follow_id_following = ?";
    $stmt = self::conn()->prepare($sql);
    return $stmt->execute([$followerId, $followingId]);
  }

}
