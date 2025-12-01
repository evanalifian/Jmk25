<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\EditProfileModel;

class EditProfileController
{
    public function renderEdit()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $userIdFromSession = $_SESSION['login']['id_user'] ?? 0;

        if ($userIdFromSession == 0) {
            header("Location: /login");
            exit;
        }

        $data = EditProfileModel::GetUserProfile($userIdFromSession);

        if (empty($data)) {
            echo "User tidak ditemukan.";
            return;
        }

        $user = [
            'username' => $data['username'],
            'user_email' => $data['user_email'],
            'user_display' => $data['user_display'],
            'user_pict' => $data['user_pict'],
            'user_bio' => $data['user_bio']
        ];

        $model = [
            'title' => 'Edit Profil',
            'user' => $user,
            'menus' => [
                [ 'text' => 'Edit Profil', 'url' => '#', 'active' => true ]
            ],
            'hideSidebar' => false
        ];

        View::render("/user/edit", $model);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() == PHP_SESSION_NONE) session_start();
            
            $userId = $_SESSION['login']['id_user'] ?? 0;

            if ($userId == 0) {
                header("Location: /login");
                exit;
            }

            $displayName = $_POST['user_display'] ?? '';
            $bio = $_POST['user_bio'] ?? '';
            
            $isSuccess = EditProfileModel::UpdateUserProfile($userId, $displayName, $bio);

            if ($isSuccess) {
                $_SESSION['login']['user_display'] = $displayName;
                
                header("Location: /profile");
                exit;
            } else {
                echo "Gagal mengupdate profil.";
            }
        }
    }
}