<?php

// Membuat namespace berdasarkan namespace autoload
namespace Jmk25\App;

class Router
{
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
  public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
  {
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
  public static function run()
  {
    $path = '/';

    if (isset($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
    } elseif (isset($_SERVER['REQUEST_URI'])) {
      // --- BAGIAN PENTING YANG HARUS DIUBAH ---
      // Pakai parse_url agar '?id=1' dibuang saat mencocokkan rute
      $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    $method = $_SERVER['REQUEST_METHOD'];

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