<?php
namespace Jmk25\Models;

use Jmk25\Config\Database;

class EditProfileModel{
    public static function conn() {
        return Database::getConnectionDB();
    }

    public static function GetUserProfile() {
        $sql = "SELECT * FROM user WHERE id = ?";
        
        $statement = self::conn()->prepare($sql);
        $statement->execute([$_SESSION['login']['id_user']]); // Ambil ID dari session login

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public static function UpdateUserProfile($display, $bio, $pict = null) {
        $id = $_SESSION['login']['id_user'];

        if ($pict) {
            // Update dengan foto baru
            $sql = "UPDATE user SET user_display = ?, user_bio = ?, user_pict = ? WHERE id = ?";
            $stmt = self::conn()->prepare($sql);
            return $stmt->execute([$display, $bio, $pict, $id]);
        } else {
            // Update tanpa ganti foto
            $sql = "UPDATE user SET user_display = ?, user_bio = ? WHERE id = ?";
            $stmt = self::conn()->prepare($sql);
            return $stmt->execute([$display, $bio, $id]);
        }
    }
}
?>