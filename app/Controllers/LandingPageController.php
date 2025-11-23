<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;

class LandingPageController {
  public function index(): void {
    $response = @file_get_contents("https://meme-api.com/gimme/memes/10");
    $data = json_decode($response, true);

    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "data" => $data
    ];

    View::render("landing_page", $model);
  }
}

?>