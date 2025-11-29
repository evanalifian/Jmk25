<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;

class LandingPageController {
  public static function index(){
    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "hideSidebar" => false
    ];
    View::renderLanding("/home/landing", $model);
  }
}

?>