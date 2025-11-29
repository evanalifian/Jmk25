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

        $sql = "SELECT upload.*, 
                user.username, 
                user.user_pict,
                user.user_display,
                content_foto.foto_img_url, 
                content_foto.foto_alt_text,
                mark.mark_at FROM mark
                JOIN upload ON mark.mark_upload_id = upload.id_upload
                JOIN user ON upload.upload_user_id = user.id
                LEFT JOIN content_foto ON upload.id_upload = content_foto.id_upload
                WHERE mark.mark_user_id = ? 
                ORDER BY mark.mark_at DESC";

        $statement = $db->prepare($sql);
        $statement->execute([$userId]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}