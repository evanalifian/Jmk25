<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\PostModel;

class HomeController {
public static function index(): void {
  $data = PostModel::getAllPhotoPosts();
  
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
  

}

?>