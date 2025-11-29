<?php

namespace Jmk25\Controllers;

use Jmk25\Models\LikesModel;

class LikesController {

    public function toggle() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        if (!isset($_SESSION['login']['id_user'])) {
            echo json_encode(['status' => 'error', 'message' => 'Login dulu bos']);
            exit;
        }

        $userId = $_SESSION['login']['id_user'];
        $uploadId = $_POST['id_upload'] ?? null;

        if (!$uploadId) {
            echo json_encode(['status' => 'error', 'message' => 'No ID provided']);
            exit;
        }

        try {
            $action = LikesModel::toggleLike($userId, $uploadId);

            echo json_encode([
                'status' => 'success',
                'action' => $action
            ]);

        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}