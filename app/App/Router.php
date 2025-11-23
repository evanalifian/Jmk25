<?php

// Membuat namespace berdasarkan namespace autoload
namespace Jmk25\App;

class Router {
  /**
   * Informasi Route yang akan dijalankan
   * @var array
   */
  private static array $routes = [];

  /**
   * Menampung route berdasarkan path yang didaftarkan
   * @param string $method
   * @param string $path
   * @param string $controller
   * @param string $function
   * @return void
   */
  public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void {
    self::$routes[] = [
      "method" => $method,
      "path" => $path,
      "controller" => $controller,
      "function" => $function,
      "middlewares" => $middlewares
    ];
  }

  /**
   * jalankankan Route yang sudah didaftarkan
   * @return void
   */
  public static function run() {
    $path = "/";
    $method = $_SERVER['REQUEST_METHOD'];

    if (isset($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
    }

    foreach (self::$routes as $route) {
      $pattern = "#^" . $route['path'] . "$#";
      if (preg_match($pattern, $path, $variables) && $method == $route["method"]) {
        $controller = new $route["controller"];
        $function = $route["function"];

        foreach ($route["middlewares"] as $middleware) {
          $instance = new $middleware;
          $instance->before();
        }

        array_shift($variables);
        call_user_func_array([$controller, $function], $variables);
        return;
      }
    }
  
    // Kembalikan ika halaman tidak ditemukan
    http_response_code(404);
    echo "Halaman tidak ditemukan";
  }
}