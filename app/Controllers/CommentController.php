<?php 

namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\CommentModel;

class CommentController {

    public function index($id_upload) {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $currentUserId = $_SESSION['login']['id_user'] ?? 0;

        $post = CommentModel::getPostById($id_upload, $currentUserId);

        if (!$post) {
            header("Location: /");
            exit;
        }

        $comments = CommentModel::getCommentsByPost($id_upload);

        $model = [
            'title' => 'Postingan',
            'post' => $post,
            'comments' => $comments,
            'currentUserPict' => $_SESSION['login']['user_pict'] ?? 'default.jpg',
            "hideSidebar" => true
        ];

        View::render('comment/index', $model);
    }
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             if (session_status() == PHP_SESSION_NONE) session_start();
             
             $userId = $_SESSION['login']['id_user'] ?? 0;
             
             if ($userId == 0) {
                 header("Location: /login"); 
                 exit;
             }

             $uploadId = $_POST['upload_id'];
             $commentText = $_POST['comment_text'];

             if (!empty($uploadId) && !empty(trim($commentText))) {
                 CommentModel::createComment($userId, $uploadId, $commentText);
             }

             header("Location: /" . $uploadId);
             exit;
        }
    }
}