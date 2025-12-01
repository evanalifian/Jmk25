<?php
namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class EditProfileModel {
    
    public static function conn()
    {
        return Database::getConnectionDB();
    }
    
    public static function GetUserProfile($user_id){
        
        if (empty($user_id) || !is_numeric($user_id)) {
            return [];
        }

        $sql = "SELECT * FROM user WHERE id = ?";
        
        $statement = self::conn()->prepare($sql);
        $statement->bindValue(1, $user_id, PDO::PARAM_INT); 
        
        try {
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            
            return $result ?: [];
            
        } catch (\PDOException $e) {
            error_log("Database Error in GetUserProfile: " . $e->getMessage());
            return [];
        }
    }

    public static function UpdateUserProfile($userId, $displayName, $bio) {
        $sql = "UPDATE user SET user_display = ?, user_bio = ? WHERE id = ?";
        
        $statement = self::conn()->prepare($sql);
        $statement->bindValue(1, $displayName);
        $statement->bindValue(2, $bio);
        $statement->bindValue(3, $userId, PDO::PARAM_INT);
        
        try {
            return $statement->execute();
        } catch (\PDOException $e) {
            error_log("Database Error in UpdateUserProfile: " . $e->getMessage());
            return false;
        }
    }
}