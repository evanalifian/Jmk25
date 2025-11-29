<?php

// Membuat namespace berdasarkan namespace autoload
namespace Jmk25\App;

class View {
  public static function render(string $view, $model = []): void {
    require_once __DIR__ . "/../Views/template/header.php";
    if (isset($model['hideSidebar']) && $model['hideSidebar'] === false) {
        require_once __DIR__ . "/../Views/template/sidebar.php";
    } 
    require_once __DIR__ . "/../Views/pages/" . $view . ".php";
    require_once __DIR__ . "/../Views/template/footer.php";
  }

  public static function redirect(string $path, array $model = []): void {
    header("Location: $path");
    exit;
  }


  public static function renderLanding(string $view, $model = []): void {
    require_once __DIR__ . "/../Views/template/landing/header.php";
    require_once __DIR__ . "/../Views/pages/" . $view . ".php";
    require_once __DIR__ . "/../Views/template/landing/footer.php";
  }
}