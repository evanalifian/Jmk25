<?php 
namespace Jmk25\Models;

use Jmk25\App\View;
use Jmk25\Config\Database;
use PDO;
use PDOException;

class PostContentModel {
       public static function conn()
    {
        return Database::getConnectionDB();

    }

    public static function getCategories() {
        $db = self::conn();
        $stmt = $db->query("SELECT * FROM category ORDER BY category_name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public static function getGroups() {
        $db = self::conn();
        $stmt = $db->query("SELECT id_group, group_name FROM `group` ORDER BY group_name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      
      public static function createPost($userId, $categoryId, $groupId, $caption, $filePath, $fileType) {
      $db = self::conn();
        try {
            $db->beginTransaction();

            $groupId = empty($groupId) ? null : $groupId;

            $sqlUpload = "INSERT INTO upload (upload_user_id, upload_category_id, upload_group_id, upload_caption) 
                          VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sqlUpload);
            $stmt->execute([$userId, $categoryId, $groupId, $caption]);
            
            $uploadId = $db->lastInsertId();

            if ($fileType === 'image') {
                $sqlContent = "INSERT INTO content_foto (id_upload, foto_img_url, foto_alt_text) 
                               VALUES (?, ?, ?)";
                $altText = !empty($caption) ? substr($caption, 0, 100) : 'Meme Image'; 
                
                $stmtFoto = $db->prepare($sqlContent);
                $stmtFoto->execute([$uploadId, $filePath, $altText]);

            } elseif ($fileType === 'video') {
                $sqlContent = "INSERT INTO content_video (id_upload, video_url, video_duration_seconds) 
                               VALUES (?, ?, NULL)"; // Duration NULL butuh library FFMpeg
                
                $stmtVideo = $db->prepare($sqlContent);
                $stmtVideo->execute([$uploadId, $filePath]);
            }

            $db->commit();
            View::redirect("/profile");
            return $uploadId;

        } catch (PDOException $e) {
            $db->rollBack();
            throw $e;
        }
    }
}