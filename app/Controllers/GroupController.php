<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\GroupModel;
use Jmk25\Models\UserModel;

class GroupController
{
    public function renderDetail()
    {
        // 1. Ambil ID User Login
        if (session_status() == PHP_SESSION_NONE) session_start();
        $myId = $_SESSION['login']['id_user'] ?? 0;
        
        $groupId = $_GET['id'] ?? 1;

        // 2. CEK STATUS MEMBER (LOGIKA BARU)
        // Jika user bukan member, kita kosongkan $groupInfo agar View menampilkan "Belum Tergabung"
        $isMember = false;
        if ($myId != 0) {
            $isMember = GroupModel::isMember($groupId, $myId);
        }

        // Default data kosong
        $groupInfo = [];
        $formattedPosts = [];
        $formattedMembers = [];

        // HANYA AMBIL DATA JIKA DIA ADALAH MEMBER
        if ($isMember) {
            $groupDB = GroupModel::getGroupById($groupId);
            
            if ($groupDB) {
                $totalMember = GroupModel::getMemberCount($groupId);
                $membersDB = GroupModel::getGroupMembers($groupId);

                $groupInfo = [
                    'id' => $groupDB['id_group'],
                    'owner_id' => $groupDB['group_owner_user_id'],
                    'name' => $groupDB['group_name'],
                    'desc' => $groupDB['group_desc'],
                    'member_count' => $totalMember,
                    'cover' => '/assets/default_cover.jpg',
                    'icon' => $groupDB['group_pict'] ? '/assets/' . $groupDB['group_pict'] : 'https://i.pinimg.com/1200x/aa/17/59/aa1759de4f9a01bb4f7966133d78c758.jpg'
                ];

                // Ambil Postingan
                $postsDB = GroupModel::getPostsByGroupId($groupId);
                foreach ($postsDB as $p) {
                    // ... (Logika mapping media type sama seperti sebelumnya) ...
                    $mediaType = 'text';
                    $mediaUrl = null;
                    if (!empty($p['foto_img_url'])) {
                        $mediaType = 'image';
                        $mediaUrl = $p['foto_img_url'];
                    } elseif (!empty($p['video_url'])) {
                        $mediaType = 'video';
                        $mediaUrl = $p['video_url'];
                    }

                    $formattedPosts[] = [
                        'id' => $p['id_upload'],
                        'username' => $p['user_display'],
                        'user_pict' => "https://i.pinimg.com/1200x/8d/e5/84/8de5841f06b0eefb417b54634ac7b8d2.jpg",
                        'time' => $p['upload_created_at'],
                        'caption' => $p['upload_caption'],
                        'media_type' => $mediaType,
                        'media_url' => $mediaUrl
                    ];
                }

                // Ambil Member
                foreach($membersDB as $m) {
                    $formattedMembers[] = [
                        'id' => $m['id'],
                        'name' => $m['user_display'],
                        'username' => $m['username'],
                        'pict' => $m['user_pict'] ? '/assets/' . $m['user_pict'] : '/assets/default.jpg'
                    ];
                }
            }
        } 
        // JIKA BUKAN MEMBER, $groupInfo TETAP KOSONG []
        // Ini akan memicu tampilan "Belum Tergabung" di View.

        $model = [
            'title' => 'Grup',
            'menus' => [['text' => 'Grup', 'url' => '#', 'active' => true]],
            'current_user_id' => $myId,
            'group' => $groupInfo, 
            'posts' => $formattedPosts,
            'members' => $formattedMembers
        ];

        View::render("/group/group_display", $model);
    }

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


        $model = [
            'title' => 'Temukan',
            'menus' => [['text' => 'Temukan', 'url' => '#', 'active' => true]],
            'groups' => $formattedGroups,
            'users' => $formattedUsers 
        ];

        View::render("/group/explore", $model);
    }
    public function join()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (session_status() == PHP_SESSION_NONE) session_start();
            $userId = $_SESSION['login']['id_user'] ?? 0;
            $groupId = $_POST['group_id'] ?? 0;

            if ($userId != 0 && $groupId != 0) {
                try {
                    // Insert ke DB
                    $sql = "INSERT INTO group_member (member_group_id, member_user_id) VALUES (?, ?)";
                    $stmt = GroupModel::conn()->prepare($sql);
                    $stmt->execute([$groupId, $userId]);

                    // Return JSON Sukses
                    echo json_encode(['status' => 'success', 'message' => 'Berhasil gabung']);
                } catch (\Exception $e) {
                    // Biasanya error karena duplikat (sudah join)
                    echo json_encode(['status' => 'error', 'message' => 'Gagal gabung']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            }
            exit; // Stop agar tidak render view
        }
    }

    public function leave()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() == PHP_SESSION_NONE) session_start();
            $userId = $_SESSION['login']['id_user'] ?? 0;
            $groupId = $_POST['group_id'] ?? 0;

            if ($userId != 0 && $groupId != 0) {
                GroupModel::leaveGroup($groupId, $userId);
            }

            header("Location: /group/group_display?id=" . $groupId);
            exit;
        }
    }

    public function kickMember()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (session_status() == PHP_SESSION_NONE) session_start();
            $currentUserId = $_SESSION['login']['id_user'] ?? 0;
            
            $groupId = $_POST['group_id'] ?? 0;
            $targetUserId = $_POST['member_id'] ?? 0;

            // 1. Validasi: Ambil data grup untuk cek siapa ownernya
            $groupDB = GroupModel::getGroupById($groupId);

            // 2. Keamanan: Pastikan yang melakukan request ADALAH OWNER GRUP
            if ($groupDB && $groupDB['group_owner_user_id'] == $currentUserId) {
                
                // 3. Jangan biarkan owner menendang dirinya sendiri
                if ($targetUserId != $currentUserId) {
                    // Kita bisa pakai fungsi leaveGroup karena logikanya sama (hapus baris di db)
                    GroupModel::leaveGroup($groupId, $targetUserId);
                }
            }

            // Redirect kembali
            header("Location: /group/group_display?id=" . $groupId);
            exit;
        }
    }
}