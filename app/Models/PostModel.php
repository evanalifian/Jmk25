<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class PostModel {
  public static function conn() {
    return Database::getConnectionDB();
  }

  public static function getAllPhotoPosts() {
    $statement = self::conn()->prepare("
      SELECT * FROM content_foto
      JOIN upload ON (upload.id_upload = content_foto.id_upload)
      JOIN user ON (upload.id_upload = user.id)
      JOIN category ON (upload.upload_category_id = category.id_category)
    ");
    $statement->execute([]);

    return $statement;
  }
}