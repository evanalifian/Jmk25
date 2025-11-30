<?php

namespace Jmk25\Controllers;

use Jmk25\Models\ShareModel;

class ShareController
{
    public static function track()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['post_id'])) {
            ShareModel::incrementShareCount($data['post_id']);
            
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit;
        }
    }
}