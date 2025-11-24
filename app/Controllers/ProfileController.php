<?php
namespace Jmk25\Controllers;


use Jmk25\App\View;
use Jmk25\Models\ProfileModel;

class ProfileController{
  public static function profile(){
    $data = ProfileModel::getAllProfile();

    $model = [
      "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "data" => $data,
      "menus" => [
        [
          "text" => "Profile",
          "url" => "/profile"
        ]
      ],
      "hideSidebar" => false
    ];
    View::render("/profile/index", $model);
  }
}
?>