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
                    user.username, 
                    user.user_pict, 
                    user.user_display,
                    content_foto.foto_img_url, 
                    content_foto.foto_alt_text,
                    content_video.video_url
                FROM upload
                JOIN user ON (user.id = upload.upload_user_id)
                LEFT JOIN content_foto ON (content_foto.id_upload = upload.id_upload)
                LEFT JOIN content_video ON (content_video.id_upload = upload.id_upload)
                WHERE user.id = :uid 
                ORDER BY upload.id_upload DESC";
        $statement = $db->prepare($sql);

        $statement->execute(['uid' => $userId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserIdByUsername($username)
    {
        $db = self::conn();
        $sql = "SELECT id FROM user WHERE username = :username";
        $stmt = $db->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }

    public static function isFollowing($myId, $targetId)
    {
        $db = self::conn();
        $sql = "SELECT COUNT(*) as count FROM follow 
                WHERE follow_id_followers = :myId 
                AND follow_id_following = :targetId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['myId' => $myId, 'targetId' => $targetId]);
        return $stmt->fetchColumn() > 0;
    }
}