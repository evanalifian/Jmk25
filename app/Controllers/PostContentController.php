<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\PostContentModel;

class PostContentController {
  
    public function index(){
        $categories = PostContentModel::getCategories();
        $groups = PostContentModel::getGroups();

        $model = [
            'title' => 'Buat Postingan Baru',
            'description' => 'Halaman untuk mengunggah foto atau video baru',
            'categories' => $categories,
            'groups' => $groups,
            'menus' => [
                [ 'text' => 'Buat Postingan', 'url' => '#', 'active' => true ]
            ],
            "hideSidebar" => false
        ];

        View::render("/post/create", $model);
    }

public function store(){
        $root_path = dirname(__DIR__, 2); 
        
        $basePostDir = $root_path . "/public/uploads/posts/";

        if(!isset($_POST['upload_category_id']) || !isset($_FILES['media_file'])){
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Kategori dan File wajib diisi!']);
            return;
        }

        $userId = $_SESSION['login']['id_user'] ?? 0; 
        if($userId === 0) {
             http_response_code(401);
             echo json_encode(['status' => 'error', 'message' => 'Login dulu blok!']);
             return;
        }

        $caption = $_POST['upload_caption'] ?? '';
        $categoryId = $_POST['upload_category_id'];
        $groupId = $_POST['upload_group_id'] ?? null;
        $file = $_FILES['media_file'];

        $storedFilePath = ''; 
        $fileType = ''; 

        if ($file['error'] === UPLOAD_ERR_OK) {
            
            $file_mime = mime_content_type($file['tmp_name']);
            
            $allowed_images = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $allowed_videos = ['video/mp4', 'video/webm', 'video/ogg'];

            $subFolder = ""; 

            if(in_array($file_mime, $allowed_images)){
                $fileType = 'image';
                $subFolder = "images/";
            } elseif (in_array($file_mime, $allowed_videos)) {
                $fileType = 'video';
                $subFolder = "videos/"; //
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Format file ga support.']);
                return;
            }

            $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
            $new_name = uniqid('post_', true) . '.' . $ext;
            
            $targetDir = $basePostDir . $subFolder;
            $targetFile = $targetDir . $new_name;
            
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0777, true)) {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Gagal membuat folder upload.']);
                    return;
                }
            }
            
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                
                $storedFilePath = '/uploads/posts/' . $subFolder . $new_name; 

            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Gagal memindahkan file.']);
                return;
            }

        } else {
             http_response_code(400);
             echo json_encode(['status' => 'error', 'message' => 'File error atau kosong.']);
             return;
        }
        try {
            $postId = PostContentModel::createPost(
                $userId, 
                $categoryId, 
                $groupId, 
                $caption, 
                $storedFilePath, 
                $fileType
            );
            
            echo json_encode([
                'status' => 'success',
                'redirect_url' => '/post/detail/' . $postId, 
                'message' => 'Postingan berhasil dibuat!'
            ]);
            
        } catch (\Exception $e) {
            if (file_exists($targetFile)) {
                 unlink($targetFile);
            }
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }
}
?>