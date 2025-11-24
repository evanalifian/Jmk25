<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class ProfileModel
{
  public static function conn()
  {
    return Database::getConnectionDB();
  }

  public static function getAllProfile()
  {
    $id = $_SESSION['login']['id_user'];
    $statement = self::conn()->prepare("
      SELECT * FROM upload
      JOIN user ON (user.id = upload.upload_user_id)
      JOIN content_foto ON (content_foto.id_upload = upload.id_upload)
      WHERE user.id = '$id'
    ");
    $statement->execute([]);

    return $statement;
  }
}