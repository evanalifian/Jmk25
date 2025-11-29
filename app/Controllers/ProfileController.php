<?php
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\ProfileModel;

class ProfileController {
  
  public static function profile() {
    if (session_status() === PHP_SESSION_NONE) session_start();

    $userId = $_SESSION['login']['id_user'] ?? 0;

    $profileData = ProfileModel::getUserProfileData($userId);
    $postData = ProfileModel::getUserPosts($userId);
    $model = [
      "title" => "Profile Saya | JMK25",
      "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
      "dataProfile" => $profileData,
      "dataPost" => $postData,
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