<?php

namespace Jmk25\Middlewares;

class IsNotAuthMiddleware implements Middleware {
  function before(): void {
    session_start();

    if (!isset($_SESSION["login"])) {
      header("Location: /landing");
      exit;
    }
  }
}