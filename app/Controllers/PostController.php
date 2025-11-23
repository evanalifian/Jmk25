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

    // Halaman Detail (See Picture)
    public function renderView()
    {
        // Data Dummy untuk preview
        $model = [
            'title' => 'Detail Postingan',
            'description' => 'Lihat foto dan video terbaru',
            'menus' => [['text' => 'Postingan', 'url' => '#', 'active' => true]],
            'post' => [
                'username' => 'pengguna_demo',
                'user_pict' => '/assets/default.jpg',
                'location' => 'Jakarta, Indonesia',
                'media_type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'caption' => 'Kucing lucu sedang bersantai di sore hari 🐱☕ #catlife',
                'time' => '2 jam yang lalu'
            ]
        ];

        // Memanggil file: app/Views/pages/post/view.php
        View::render("/post/view", $model);
    }

    // Halaman Notifikasi
    public function renderNotifications()
{
    // 1. Siapkan Data
    $model = [
        'title' => 'Notifikasi',
        'description' => 'Aktivitas terbaru di akun Anda',
        'menus' => [
            [
                'text' => 'Notifikasi',
                'url' => '#',
                'active' => true
            ]
        ]
    ];

    // 2. Panggil View
    // Pastikan path-nya sesuai: app/Views/pages/notification/index.php
    // (Jika menggunakan class View::render yang memanggil folder 'pages')
    View::render("/notification/index", $model);
}

    // Proses Simpan (Tidak pakai View::render karena ini aksi, bukan halaman)
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