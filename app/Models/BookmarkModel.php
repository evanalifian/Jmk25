<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class BookmarkModel {

public static function conn() {
    return Database::getConnectionDB();
}
    public static function toggleBookmark($userId, $uploadId) {
        $db = self::conn();

        try {
            $checkStmt = $db->prepare("SELECT id_mark FROM mark WHERE mark_user_id = ? AND mark_upload_id = ?");
            $checkStmt->execute([$userId, $uploadId]);
            
            if ($checkStmt->rowCount() > 0) {
                $deleteStmt = $db->prepare("DELETE FROM mark WHERE mark_user_id = ? AND mark_upload_id = ?");
                $deleteStmt->execute([$userId, $uploadId]);
                return 'removed'; 
            } else {
                $insertStmt = $db->prepare("INSERT INTO mark (mark_user_id, mark_upload_id) VALUES (?, ?)");
                $insertStmt->execute([$userId, $uploadId]);
                return 'saved'; 
            }
        } catch (\PDOException $e) {
            throw new \Exception("Database Error: " . $e->getMessage());
        }
    }

    public static function GetAllBookmark($userId) {
        $db = self::conn();

        $sql = "SELECT 
            upload.*,
            user.username,
            user.user_pict,
            user.user_display,
            content_foto.foto_img_url,
            content_foto.foto_alt_text,
            category.category_name,
            mark.mark_at,
            (SELECT COUNT(*) FROM `like` 
             WHERE `like`.like_upload_id = upload.id_upload) AS total_likes,
            (SELECT COUNT(*) FROM komentar 
             WHERE komentar.comment_upload_id = upload.id_upload) AS total_comments,
            (SELECT COUNT(*) FROM `like` 
             WHERE `like`.like_upload_id = upload.id_upload 
             AND `like`.like_user_id = :uid) AS is_liked,
            1 AS is_bookmarked
            FROM mark
            JOIN upload ON mark.mark_upload_id = upload.id_upload
            JOIN user ON upload.upload_user_id = user.id
            LEFT JOIN content_foto ON upload.id_upload = content_foto.id_upload
            JOIN category ON upload.upload_category_id = category.id_category
            WHERE mark.mark_user_id = :uid
            ORDER BY mark.mark_at DESC";


        $statement = $db->prepare($sql);
        $statement->execute([
            ':uid' => $userId,
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}