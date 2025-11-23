<?php

namespace Jmk25\Config;

class Database {
  private static ?\PDO $pdo = null;

  public static function getConnectionDB(string $env = "dev"): \PDO {
    if (self::$pdo == null) {
      require __DIR__ . "/../../config/database.php";
      $conn = getConfigDB();
      self::$pdo = new \PDO(
        $conn["database"][$env]["path"],
        $conn["database"][$env]["username"],
        $conn["database"][$env]["password"]
      );
    }
    return self::$pdo;
  }
}