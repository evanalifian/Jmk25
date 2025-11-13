<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;

class LandingPageController {
  public function index(): void {
    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus."
    ];

    View::render("landing_page", $model);
  }
}