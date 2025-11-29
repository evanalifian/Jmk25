<?php
namespace Jmk25\Models;

use Jmk25\Config\Database;

class EditProfileModel{
    public static function GetUserProfile(){
        $sql = "SELECT * FROM user WHERE id_user = ?";
        $statement = self::conn()->prepare($sql);
        $statement->bind_param("i", $_SESSION['login']['id_user']);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>