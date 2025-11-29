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

        $sql = "SELECT 
                    upload.*, 
                    content_foto.foto_img_url,
                    content_foto.foto_alt_text,
                    (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload) AS total_likes,
                    (SELECT COUNT(*) FROM komentar WHERE komentar.comment_upload_id = upload.id_upload) AS total_comments,
                    (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload AND `like`.like_user_id = :current_user_id) AS is_liked,
                    (SELECT COUNT(*) FROM mark WHERE mark.mark_upload_id = upload.id_upload AND mark.mark_user_id = :current_user_id) AS is_bookmarked
                FROM upload
                JOIN content_foto ON (upload.id_upload = content_foto.id_upload)
                WHERE upload.upload_user_id = :uid
                ORDER BY upload.upload_created_at DESC";

        $statement = $db->prepare($sql);

        $statement->execute(['uid' => $userId, 'current_user_id' => $userId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}