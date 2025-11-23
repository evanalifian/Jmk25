<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;

class HomeController {
public static function index(): void {
    $response = @file_get_contents("https://meme-api.com/gimme/memes/20");
    $data = json_decode($response, true);

    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "data" => $data,
      "menus" => [
        [ "text" => "Untuk Anda", 
          "url" => "/",
          "active" => true],
        [ "text" => "Mengikuti", 
          "url" => "/following",
          "active" => false],
        [ "text" => "Grup", 
          "url" => "/Grup",
          "active" => false],
      ],
      "hideSidebar" => false
    ];
    
    View::render("/home/dashboard", $model);
  }
  
  public static function landing(){
    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "hideSidebar" => false
    ];
    View::renderLanding("/home/landing", $model);
  }
  
  public static function profile(){
    $response = @file_get_contents("https://meme-api.com/gimme/memes/20");
    $data = json_decode($response, true);
    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "data" => $data,
      "menus" => [
        [ "text" => "Profile", 
        "url" => "/profile"]
      ],
      "hideSidebar" => false
    ];
    View::render("/profile/index", $model);
}
}

?>