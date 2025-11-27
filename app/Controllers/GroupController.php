<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;

class GroupController
{
    public function renderDetail()
    {
        // 1. Data Grup (Ceritanya ambil dari DB berdasarkan ID)
        $groupInfo = [
            'id' => 1,
            'name' => 'Komunitas Meme Indonesia',
            'desc' => 'Tempat berbagi meme lucu khusus warga +62',
            'member_count' => '12k',
            'cover' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b', // Gambar abstrak
            'icon' => 'https://images.unsplash.com/photo-1511367461989-f85a21fda167'  // Gambar orang
        ];

        // 2. Data Postingan (Filter: WHERE group_id = 1)
        // Ini struktur data yang sama dengan tabel database Anda
        $groupPosts = [
            [
                'id' => 101,
                'username' => 'User 2',
                'user_pict' => 'https://images.unsplash.com/photo-1511367461989-f85a21fda167',
                'verified' => true,
                'time' => '2025-11-23 11:45:06',
                'caption' => 'Two Buttons',
                'media_type' => 'image',
                'media_url' => 'https://i.imgflip.com/1g8my4.jpg', // Meme Two Buttons
                'likes' => '1.2k',
                'comments' => 45
            ]
        ];

        $model = [
            'title' => $groupInfo['name'],
            'menus' => [['text' => 'Grup', 'url' => '#', 'active' => true]],
            'group' => '',
            'posts' => ''
        ];

        View::render("/group/group_display", $model);
    }
    // ... fungsi renderDetail dan join yang sudah ada ...

    public function renderExplore()
    {
        // 1. Data Dummy Semua Grup (Nanti diganti query: SELECT * FROM group)
        $allGroups = [
            [
                'id' => 1,
                'name' => 'Komunitas Meme',
                'icon' => '/assets/default_group.jpg',
                'desc' => 'Asupan meme segar'
            ],
            [
                'id' => 2,
                'name' => 'Programmer Indonesia',
                'icon' => '/assets/default_group.jpg',
                'desc' => 'Diskusi coding santuy'
            ],
            [
                'id' => 3,
                'name' => 'Pecinta Kucing',
                'icon' => '/assets/default_group.jpg',
                'desc' => 'Miaw miaw'
            ]
        ];

        // 2. Data Dummy Semua User (Nanti diganti query: SELECT * FROM user)
        $allUsers = [
            [
                'id' => 1,
                'name' => 'Jayro Fadil',
                'username' => '@jayro',
                'pict' => '/assets/default.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Siti Aminah',
                'username' => '@siti_cat',
                'pict' => '/assets/default.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Budi Santoso',
                'username' => '@budicoding',
                'pict' => '/assets/default.jpg'
            ]
        ];

        $model = [
            'title' => 'Temukan',
            'menus' => [['text' => 'Temukan', 'url' => '#', 'active' => true]],
            'groups' => $allGroups,
            'users' => $allUsers
        ];

        View::render("/group/explore", $model);
    }  
}