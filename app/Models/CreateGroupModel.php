<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;
use PDO;

class CreateGroupModel
{
    public static function conn()
    {
        return Database::getConnectionDB();
    }
    public static function CreateGroup($owner, $name, $desc, $pict)
    {
        $db = self::conn();
        $query = "INSERT INTO `group` 
                  (group_owner_user_id, group_name, group_desc, group_pict, group_created_at) 
                  VALUES (:owner, :name, :desc, :pict, NOW())";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'owner' => $owner,
            'name' => $name,
            'desc' => $desc,
            'pict' => $pict
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}