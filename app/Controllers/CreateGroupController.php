<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\CreateGroupModel;

class CreateGroupController {
    
    public function index(){
        $model = [
            "title" => "Tersimpan",
            "description" => "Website untuk memposting meme shitpost di lengkungan kampus.",
            "data" => "",
            "menus" => [
                [ "text" => "Buat Grup", 
                  "url" => "/group/create",
                  "active" => true]
            ],
            "hideSidebar" => false
        ];
        
        View::render("/group/create", $model);
    }
    
    public function postCreateGroup(){
        $root_path = dirname(__DIR__, 2); 
        
        $baseGroupDir = $root_path . "/public/uploads/group/"; 
        
        if(!isset($_POST['group_name']) || !isset($_POST['group_desc']) || !isset($_FILES['group_pict'])){
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Data input tidak lengkap']);
            return;
        }

        $name = $_POST['group_name'];
        $desc = $_POST['group_desc'];
        $pict = $_FILES['group_pict'];
        $owner = $_SESSION['login']['id_user'] ?? 0; 

        if($owner === 0) {
             http_response_code(401);
             echo json_encode(['status' => 'error', 'message' => 'User tidak terautentikasi']);
             return;
        }
        
        $group_image_path = 'default.jpg';
        $targetFile = null;

        if ($pict['error'] === UPLOAD_ERR_OK) {
            
            $file_mime_type = mime_content_type($pict['tmp_name']);
            
            $allowed_images = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $allowed_videos = ['video/mp4', 'video/webm', 'video/ogg']; 

            $subFolder = "";

            if(in_array($file_mime_type, $allowed_images)){
                $subFolder = "images/";
            } elseif (in_array($file_mime_type, $allowed_videos)) {
                $subFolder = "videos/";
            } else {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Tipe file tidak diizinkan.']);
                return;
            }

            $file_extension = pathinfo($pict["name"], PATHINFO_EXTENSION);
            $new_file_name = uniqid('group_', true) . '.' . $file_extension;
            
            $targetDir = $baseGroupDir . $subFolder;
            $targetFile = $targetDir . $new_file_name;
            
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0777, true)) {
                    http_response_code(500);
                    echo json_encode(['status' => 'error', 'message' => 'Gagal membuat folder upload.']);
                    return;
                }
            }
            
            if (move_uploaded_file($pict["tmp_name"], $targetFile)) {
                $group_image_path = '/uploads/group/' . $subFolder . $new_file_name;
            } else {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Gagal memindahkan file. Cek izin folder.']);
                return;
            }

        } elseif ($pict['error'] !== UPLOAD_ERR_NO_FILE) {
             http_response_code(400);
             echo json_encode(['status' => 'error', 'message' => 'Upload error code: ' . $pict['error']]);
             return;
        }

        try {
            $group_id = CreateGroupModel::CreateGroup($owner, $name, $desc, $group_image_path); 
            
            echo json_encode([
                'status' => 'success',
                'redirect_url' => '/group/detail/' . $group_id, 
                'file_name' => $group_image_path 
            ]);
            
        } catch (\Exception $e) {
            http_response_code(500);
            if ($group_image_path != 'default.jpg' && $targetFile && file_exists($targetFile)) {
                 unlink($targetFile);
            }
            echo json_encode(['status' => 'error', 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }
}