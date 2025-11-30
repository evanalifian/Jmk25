<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\EditProfileModel;


class EditUserController
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
            'user' => $user,
            'menus' => [
                [
                    'text' => 'Edit Profil',
                    'url' => '#',
                    'active' => true
                ]
            ]
        ];

        View::render("/user/edit", $model);
    }

    // Proses Simpan Data
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() == PHP_SESSION_NONE) session_start();
            
            $displayName = $_POST['user_display'];
            $bio = $_POST['user_bio'];
            $newPict = null;

            // Logika Upload Foto
            if (isset($_FILES['user_pict']) && $_FILES['user_pict']['error'] === 0) {
                // Buat nama unik
                $fileName = time() . '_' . $_FILES['user_pict']['name'];
                $uploadPath = __DIR__ . '/../../public/upload/profile/' . $fileName;
                
                if(move_uploaded_file($_FILES['user_pict']['tmp_name'], $uploadPath)) {
                    $newPict = $fileName;
                }
            }

            // Panggil Model untuk UPDATE database
            EditProfileModel::UpdateUserProfile($displayName, $bio, $newPict);

            // Redirect balik ke halaman profil
            header("Location: /profile");
            exit;
        }
    }
}