<?php

namespace Jmk25\App;

class View {
  public static function render(string $view, $model): void {
    require_once __DIR__ . "/../Views/template/header.php";
    require_once __DIR__ . "/../Views/pages/" . $view . ".php";
    require_once __DIR__ . "/../Views/template/footer.php";
  }
}