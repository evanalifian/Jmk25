<?php

namespace Jmk25\Controllers;


use Carbon\Carbon;
use Jmk25\App\View; // <-- Pastikan namespace ini sesuai dengan lokasi file View.php Anda
use Jmk25\Models\PostModel;

class PostController
{
    // Halaman Upload
    public function renderCreate()
    {
        $model = [
            'title' => 'Buat Postingan Baru',
            'description' => 'Halaman untuk mengunggah foto atau video baru',
            'menus' => [
                [
                    'text' => 'Buat Postingan',
                    'url' => '#',
                    'active' => true
                ]
                ],
            "hideSidebar" => false
        ];

        // Memanggil file: app/Views/pages/post/create.php
        View::render("/post/create", $model);
    }
    
    public function store()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logika simpan ke database...
            // var_dump(Carbon::now());
            // var_dump($_FILES);
            // var_dump($_POST);
            // var_dump($_SESSION['login']);  
            // die();

            $upload_path = $this->handleFotoUpload();
            if (!$upload_path) {
                $_SESSION["err_msg"] = "Gagal Upload Foto";
                return header("Location: /create");
            }

            $id_user = $_SESSION['login']['id_user'];
            $category_id = $_POST['upload_category_id'];

            $uploaded = PostModel::upload($id_user, $category_id, $_POST['upload_caption'], $upload_path);
            
            return header("Location: /profile");

            // Setelah simpan, biasanya redirect kembali ke home
            // header('Location: /');
            // exit;
        }
    }

    private function handleFotoUpload() {
        $allowed_ext = array("jpg" => "image/jpg",
                "jpeg" => "image/jpeg",
                "gif" => "image/gif",
                "png" => "image/png");
        
        $file_name = $_FILES['media_file']['name'];
        $file_type = $_FILES['media_file']['type'];
        $file_size = $_FILES['media_file']['size'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!in_array($ext, array_keys($allowed_ext))) {
            $_SESSION["error_msg"] = "Gagal Mengupload Ext Tidak didukung";
            return header("Location: /create");
        }

        $newFileName = (String) Carbon::now()->timestamp . "_" . $file_name;
        
        $upload_path = __DIR__ . "/../../public/storage/uploads_foto/" . $newFileName;
        move_uploaded_file($_FILES['media_file']['tmp_name'], $upload_path);

        return 'storage/uploads_foto/' . $newFileName;
    }
}