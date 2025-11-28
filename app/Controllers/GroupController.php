<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\GroupModel;
use Jmk25\Models\UserModel;

class GroupController
{
    public function renderDetail()
    {
        $groupId = $_GET['id'] ?? 1;

        // 1. Ambil Info Grup & Member (Kode sebelumnya)
        $groupDB = GroupModel::getGroupById($groupId);
        if (!$groupDB) { echo "Grup tidak ditemukan"; return; }
        
        $totalMember = GroupModel::getMemberCount($groupId);
        $membersDB = GroupModel::getGroupMembers($groupId);

        $groupInfo = [
            'id' => $groupDB['id_group'],
            'name' => $groupDB['group_name'],
            'desc' => $groupDB['group_desc'],
            'member_count' => $totalMember,
            'cover' => '/assets/default_cover.jpg',
            'icon' => $groupDB['group_pict'] ? '/assets/' . $groupDB['group_pict'] : '/assets/default_group.jpg'
        ];

        // ---------------------------------------------------------
        // 2. AMBIL POSTINGAN DARI DB & FORMAT DATANYA
        // ---------------------------------------------------------
        $postsDB = GroupModel::getPostsByGroupId($groupId);
        $formattedPosts = [];

        foreach ($postsDB as $p) {
            
            // Logika Menentukan Tipe Media (Gambar/Video/Teks)
            $mediaType = 'text';
            $mediaUrl = null;

            if (!empty($p['foto_img_url'])) {
                $mediaType = 'image';
                // Pastikan path-nya benar (misal: /uploads/nama_file.jpg)
                $mediaUrl = $p['foto_img_url']; 
            } elseif (!empty($p['video_url'])) {
                $mediaType = 'video';
                $mediaUrl = $p['video_url'];
            }

            $formattedPosts[] = [
                'id' => $p['id_upload'],
                'username' => $p['user_display'], // Nama Tampilan
                'user_pict' => $p['user_pict'] ? '/assets/' . $p['user_pict'] : '/assets/default.jpg',
                'time' => $p['upload_created_at'], // Tanggal upload
                'caption' => $p['upload_caption'],
                'media_type' => $mediaType,
                'media_url' => $mediaUrl
            ];
        }

        // 3. Mapping Data Member
        $formattedMembers = [];
        foreach($membersDB as $m) {
            $formattedMembers[] = [
                'name' => $m['user_display'],
                'username' => $m['username'],
                'pict' => $m['user_pict'] ? '/assets/' . $m['user_pict'] : '/assets/default.jpg'
            ];
        }

        // 4. Kirim Semua ke View
        $model = [
            'title' => $groupInfo['name'],
            'menus' => [['text' => 'Grup', 'url' => '#', 'active' => true]],
            'group' => $groupInfo, 
            'posts' => $formattedPosts, // <--- Data Postingan Asli
            'members' => $formattedMembers
        ];

        View::render("/group/group_display", $model);
    }
    // ... fungsi renderDetail dan join yang sudah ada ...

    public function renderExplore()
    {
        
        if (session_status() == PHP_SESSION_NONE) session_start();
        $myId = $_SESSION['login']['id_user'] ?? 0;

        $groupsDB = GroupModel::getAllGroups();
        $formattedGroups = [];

        foreach($groupsDB as $g) {
            
            // LOGIKA BARU: Cek apakah sudah join?
            $isJoined = false;
            if ($myId != 0) {
                $isJoined = GroupModel::isMember($g['id_group'], $myId);
            }

            $formattedGroups[] = [
                'id' => $g['id_group'],
                'name' => $g['group_name'],
                'icon' => 'https://images.unsplash.com/photo-1511367461989-f85a21fda167',
                'desc' => $g['group_desc'],
                'is_joined' => $isJoined
            ];
        }
        
        $usersDB = UserModel::getAllUsers();
        $formattedUsers = [];
        
        foreach($usersDB as $u) {
            
            // LOGIKA BARU: Cek status follow untuk setiap user
            $isFollowed = false;
            if ($myId != 0) {
                $isFollowed = UserModel::isFollowing($myId, $u['id']);
            }

            $formattedUsers[] = [
                'id' => $u['id'],
                'name' => $u['user_display'], 
                'username' => '@' . $u['username'],
                'pict' =>  'https://stickerly.pstatic.net/sticker_pack/RoQKd7eh2a6EUxtCfRXefw/1HV571/16/-496620014.webp',
                'is_followed' => $isFollowed 
            ];
        }

        // ... (Sisanya sama) ...
        $model = [
            'title' => 'Temukan',
            'menus' => [['text' => 'Temukan', 'url' => '#', 'active' => true]],
            'groups' => $formattedGroups,
            'users' => $formattedUsers 
        ];

        View::render("/group/explore", $model);
    }
    public function leave()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Ambil ID User & ID Grup
            if (session_status() == PHP_SESSION_NONE) session_start();
            $userId = $_SESSION['login']['id_user'] ?? 0;
            $groupId = $_POST['group_id'] ?? 0;

            // 2. Proses Keluar
            if ($userId != 0 && $groupId != 0) {
                GroupModel::leaveGroup($groupId, $userId);
            }

            // 3. Redirect kembali ke halaman grup
            // (Nanti tampilannya akan otomatis berubah jadi tombol "Gabung")
            header("Location: /group/group_display?id=" . $groupId);
            exit;
        }
    }
}