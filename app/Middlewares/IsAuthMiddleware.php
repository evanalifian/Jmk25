<?php

namespace Jmk25\Middlewares;

class IsAuthMiddleware implements Middleware {
  function before(): void {
    session_start();

    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
      header("Location: /dashboard");
      exit;
    }
  }
}