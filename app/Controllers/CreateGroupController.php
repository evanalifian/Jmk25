<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;
use Jmk25\Models\CreateGroupModel;

class CreateGroupController {
    
    public function index(){
        $model = [
            "title" => "Selamat Datang di JMK25 | Post Your Best Meme awokawok.",
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
        if(isset($_POST['group_name']) && isset($_POST['group_desc']) && isset($_FILES['group_pict'])){
            
            $name = $_POST['group_name'];
            $desc = $_POST['group_desc'];
            $pict = $_FILES['group_pict'];
            
            $owner = $_SESSION['login']['id_user'];
            $base_dir = dirname(dirname(dirname(__DIR__)));
            $targetDir = $base_dir . "/uploads/images/";
            
            $file_extension = pathinfo($pict["name"], PATHINFO_EXTENSION);
            $new_file_name = uniqid('group_', true) . '.' . $file_extension;
            $targetFile = $targetDir . $new_file_name;
            
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            
            if (move_uploaded_file($pict["tmp_name"], $targetFile)) {
                $group_image_path = $new_file_name;
            } else {
                $group_image_path = 'default.jpg'; 
            }

            try {
                $action = CreateGroupModel::CreateGroup($owner, $name, $desc, $group_image_path);
                if($action){
                  View::redirect('/group');
                }
                echo json_encode([
                    'status' => 'success',
                    'action' => $action,
                    'file_name' => $group_image_path 
                ]);
            } catch (\Exception $e) {
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }
        } else {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Data input tidak lengkap.']);
        }
    }
}