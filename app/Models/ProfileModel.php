<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class ProfileModel
{
  public static function conn()
  {
    return Database::getConnectionDB();
  }
  
  public static function getUserProfileData($userId)
    {
        $db = self::conn();

        $sql = "SELECT 
                    user.id,
                    user.username, 
                    user.user_pict,
                    user.user_display,
                    user.user_bio,
                    (SELECT COUNT(*) FROM follow WHERE follow.follow_id_following = user.id) AS total_followers,
                    (SELECT COUNT(*) FROM follow WHERE follow.follow_id_followers = user.id) AS total_following
                FROM user
                WHERE user.id = :uid";

        $statement = $db->prepare($sql);
        
        $statement->execute(['uid' => $userId]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserPosts($userId)
    {
        $db = self::conn();
        $sql = "SELECT * FROM upload
                JOIN user ON (user.id = upload.upload_user_id)
                JOIN content_foto ON (content_foto.id_upload = upload.id_upload)
                WHERE user.id = :uid";
        $statement = $db->prepare($sql);

        $statement->execute(['uid' => $userId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}