<?php

namespace Jmk25\Controllers;

use Jmk25\App\View; // <-- Pastikan namespace ini sesuai dengan lokasi file View.php Anda

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
            ]
        ];

        // Memanggil file: app/Views/pages/post/create.php
        View::render("/post/create", $model);
    }
    
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logika simpan ke database...
            var_dump($_POST);
            
            // Setelah simpan, biasanya redirect kembali ke home
            // header('Location: /');
            // exit;
        }
    }
}