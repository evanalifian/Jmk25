<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class LikesModel {

    public static function conn() {
        return Database::getConnectionDB();
    }

    public static function toggleLike($userId, $uploadId) {
        $db = self::conn();

        try {
            $checkStmt = $db->prepare("SELECT id_like FROM `like` WHERE like_user_id = ? AND like_upload_id = ?");
            $checkStmt->execute([$userId, $uploadId]);
            
            if ($checkStmt->rowCount() > 0) {
                $deleteStmt = $db->prepare("DELETE FROM `like` WHERE like_user_id = ? AND like_upload_id = ?");
                $deleteStmt->execute([$userId, $uploadId]);
                return 'unliked'; 
            } else {
                $insertStmt = $db->prepare("INSERT INTO `like` (like_user_id, like_upload_id) VALUES (?, ?)");
                $insertStmt->execute([$userId, $uploadId]);
                return 'liked'; 
            }
        } catch (\PDOException $e) {
            throw new \Exception("Database Error: " . $e->getMessage());
        }
    }
}