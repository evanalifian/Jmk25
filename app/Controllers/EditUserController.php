<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\EditProfileModel;

class GroupController
{
    public function renderEdit()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $userId = $_SESSION['login']['id_user'] ?? 0;

        $data = EditProfileModel::GetUserProfile();

        $user = [
            'username' => $data['username'],
            'user_email' => $data['user_email'], // Ambil dari DB
            'user_display' => $data['user_display'],  // Ambil dari DB
            'user_pict' => $data['user_pict'],     // Ambil dari DB
            'user_bio' => $data['user_bio'] // Ambil dari DB
        ];

        $model = [
            'title' => 'Edit Profil',
            'user' => $user
        ];

        View::render("/user/edit", $model);
    }

    // Proses Simpan Data
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() == PHP_SESSION_NONE) session_start();
            $userId = $_SESSION['login']['id_user'];

            $displayName = $_POST['user_display'];
            $bio = $_POST['user_bio'];
            
            

            header("Location: /profile");
            exit;
        }
    }
}
}