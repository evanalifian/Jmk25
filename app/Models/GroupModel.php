<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class GroupModel
{
    public static function conn()
    {
        return Database::getConnectionDB();
    }

    public static function getAllGroups()
    {
        $sql = "SELECT id_group, group_name, group_pict, group_desc FROM `group` ORDER BY group_created_at DESC";
        
        $statement = self::conn()->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function getGroupById($id)
    {
        $sql = "SELECT * FROM `group` WHERE id_group = ?";
        
        $statement = self::conn()->prepare($sql);
        $statement->execute([$id]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    
    public static function getPostsByGroupId($groupId)
    {
        $sql = "SELECT 
                    upload.id_upload,
                    upload.upload_caption,
                    upload.upload_created_at,
                    user.username, 
                    user.user_display, 
                    user.user_pict, 
                    content_foto.foto_img_url,
                    content_video.video_url
                FROM upload
                JOIN user ON upload.upload_user_id = user.id
                LEFT JOIN content_foto ON upload.id_upload = content_foto.id_upload
                LEFT JOIN content_video ON upload.id_upload = content_video.id_upload
                WHERE upload.upload_group_id = ?
                ORDER BY upload.upload_created_at DESC";

        $stmt = self::conn()->prepare($sql);
        $stmt->execute([$groupId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    
    
    public static function getMemberCount($groupId) 
    {
        $sql = "SELECT COUNT(*) as total FROM group_member WHERE member_group_id = ?";
        $statement = self::conn()->prepare($sql);
        $statement->execute([$groupId]);
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        
        return $result['total'];
    }
    public static function isMember($groupId, $userId)
    {
        $sql = "SELECT id_group_member FROM group_member WHERE member_group_id = ? AND member_user_id = ?";
        $statement = self::conn()->prepare($sql);
        $statement->execute([$groupId, $userId]);

        return $statement->rowCount() > 0;
    }

    public static function getGroupMembers($groupId)
    {
        $sql = "SELECT user.id, user.username, user.user_display, user.user_pict, group_member.joined_at 
                FROM group_member 
                JOIN user ON group_member.member_user_id = user.id 
                WHERE group_member.member_group_id = ?
                ORDER BY group_member.joined_at DESC";
        
        $statement = self::conn()->prepare($sql);
        $statement->execute([$groupId]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function leaveGroup($groupId, $userId)
    {
        $sql = "DELETE FROM group_member WHERE member_group_id = ? AND member_user_id = ?";
        $statement = self::conn()->prepare($sql);
        return $statement->execute([$groupId, $userId]);
    }
}