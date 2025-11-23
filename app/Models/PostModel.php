<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class PostModel {
  public static function conn() {
    return Database::getConnectionDB();
  }

  public static function getAllPhotoPosts() {
    $statement = self::conn()->prepare("SELECT * FROM content_foto");
    $statement->execute([]);

    return $statement;
  }
}