<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class CommentModel {

    public static function conn() {
        return Database::getConnectionDB();
    }

    public static function getPostById($id, $currentUserId = 0) {
        $db = self::conn();
        $sql = "SELECT 
                upload.*, 
                content_foto.foto_img_url,
                content_foto.foto_alt_text,
                user.username, user.user_pict, user.user_display,
                category.category_name,
                (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload) AS total_likes,
                (SELECT COUNT(*) FROM komentar WHERE komentar.comment_upload_id = upload.id_upload) AS total_comments,
                (SELECT COUNT(*) FROM `like` WHERE `like`.like_upload_id = upload.id_upload AND `like`.like_user_id = :uid) AS is_liked,
                (SELECT COUNT(*) FROM mark WHERE mark.mark_upload_id = upload.id_upload AND mark.mark_user_id = :uid) AS is_marked
                FROM content_foto
                JOIN upload ON (upload.id_upload = content_foto.id_upload)
                JOIN user ON (upload.upload_user_id = user.id)
                JOIN category ON (upload.upload_category_id = category.id_category)
                WHERE upload.id_upload = :id";

        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id, 'uid' => $currentUserId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getCommentsByPost($uploadId) {
        $db = self::conn();
        $sql = "SELECT k.*, u.username, u.user_pict, u.user_display
                FROM komentar k
                JOIN user u ON k.comment_user_id = u.id
                WHERE k.comment_upload_id = ?
                ORDER BY k.comment_created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([$uploadId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function createComment($userId, $uploadId, $text) {
        $db = self::conn();
        
        $sql = "INSERT INTO komentar (comment_user_id, comment_upload_id, komentar_text) 
                VALUES (:uid, :pid, :text)";
        
        $stmt = $db->prepare($sql);
        
        try {
            return $stmt->execute([
                'uid' => $userId,
                'pid' => $uploadId,
                'text' => htmlspecialchars($text) 
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }
}