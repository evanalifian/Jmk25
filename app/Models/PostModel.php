<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class PostModel {
  
  public static function conn() {
      return Database::getConnectionDB();
  }

  public static function getAllPhotoPosts($currentUserId = 0) {
    $sql = "SELECT 
            upload.*, 
            content_foto.foto_img_url,
            content_foto.foto_alt_text,
            user.id AS author_id, 
            user.username, 
            user.user_pict,
            user.user_display,
            category.category_name,
            (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload) AS total_likes,
            (SELECT COUNT(*) FROM komentar WHERE komentar.comment_upload_id = upload.id_upload) AS total_comments,
            (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload AND `like`.like_user_id = :uid) AS is_liked,
            (SELECT COUNT(*) FROM mark WHERE mark.mark_upload_id = upload.id_upload AND mark.mark_user_id = :uid) AS is_bookmarked,
            (SELECT COUNT(*) FROM follow WHERE follow_id_followers = :uid AND follow_id_following = user.id) AS is_followed
            FROM content_foto
            JOIN upload ON (upload.id_upload = content_foto.id_upload)
            JOIN user ON (upload.upload_user_id = user.id)
            JOIN category ON (upload.upload_category_id = category.id_category)           
            ORDER BY upload.upload_created_at DESC";

    $statement = self::conn()->prepare($sql);
    
    $statement->execute(['uid' => $currentUserId]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}