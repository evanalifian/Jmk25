<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;

class HomeController {
  public function index(): void {
    View::render("home/index");
  }
}