<?php
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\ProfileModel;

class ProfileController {
  
  public static function profile() {
    // 1. Start Session
    if (session_status() === PHP_SESSION_NONE) session_start();

    // 2. Cek apakah user sudah login?
    if (!isset($_SESSION['login']['id_user'])) {
        View::redirect('/user/signin');
        exit;
    }

    // 3. Ambil ID User dari Session
    $userId = $_SESSION['login']['id_user'] ?? 0;

    // 4. KIRIM $userId KE MODEL (INI YANG SEBELUMNYA KURANG)
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