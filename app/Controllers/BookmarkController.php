<?php

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\BookmarkModel;

class BookmarkController {
    
    public function toggle() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['login']['id_user'])) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            exit;
        }
        $userId = $_SESSION['login']['id_user'];
        $uploadId = $_POST['id_upload'] ?? null;

        if (!$uploadId) {
            echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
            exit;
        }

        try {
            $action = BookmarkModel::toggleBookmark($userId, $uploadId);

            echo json_encode([
                'status' => 'success',
                'action' => $action
            ]);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } 
    
    public function index() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['login']['id_user'])) {
            View::redirect('/user/signin');
            exit;
        }
        $userId = $_SESSION['login']['id_user'];
        $marks = BookmarkModel::GetAllBookmark($userId);
        
        $currentUsername = $_SESSION['login']['username'] ?? 'User';
        $model = [
        "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
        "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
        "data" => $marks,
        "username" => $currentUsername,
        "menus" => [
        [ "text" => "Tersimpan", 
          "url" => "/bookmark",
          "active" => true]
        ],
        "hideSidebar" => false
        ];
        
        View::render("/bookmark/index", $model);
    }

}