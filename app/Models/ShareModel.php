<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class ShareModel
{
    public static function incrementShareCount($postId)
    {
        $db = Database::getConnectionDB();
        
        $sql = "UPDATE upload SET share_count = share_count + 1 WHERE id_upload = :id";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $postId]);
    }
}