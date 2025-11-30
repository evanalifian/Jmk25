<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\ProfileModel;

class ProfileController {
  
  public static function profile($username = null) {
    if (session_status() === PHP_SESSION_NONE) session_start();
    $myId = $_SESSION['login']['id_user'] ?? 0;
    
    if ($username) {
        $targetId = ProfileModel::getUserIdByUsername($username);
        if (!$targetId) {
            die("User tidak ditemukan"); 
        }
    } else {
        $targetId = $myId;
    }

    $isOwnProfile = ($myId == $targetId);
    $isFollowing = false;

    if (!$isOwnProfile && $myId != 0) {
        $isFollowing = ProfileModel::isFollowing($myId, $targetId);
    }

    $profileData = ProfileModel::getUserProfileData($targetId);
    $postData = ProfileModel::getUserPosts($targetId);

    $model = [
      "title" => $profileData['user_display'] . " (@" . $profileData['username'] . ") | JMK25",
      "dataProfile" => $profileData,
      "dataPost" => $postData,
      "isOwnProfile" => $isOwnProfile,
      "isFollowing" => $isFollowing,
      "menus" => [
        [ "text" => "Profile", 
          "url" => "/profile" ,
          "active" => true]
      ],
      "hideSidebar" => false
    ];

    View::render("/profile/index", $model);
  }
}
?>