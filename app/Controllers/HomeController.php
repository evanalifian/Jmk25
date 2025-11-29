<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\PostModel;

class HomeController {
public function index() {
    if (session_status() === PHP_SESSION_NONE) session_start();

    $userId = $_SESSION['login']['id_user'] ?? 0;

    $data = PostModel::getAllPhotoPosts($userId);
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
          "url" => "/group/group_display",
          "active" => false],
      ],
      "hideSidebar" => false
    ];
    
    View::render("/home/dashboard", $model);
  }
}

?>