<?php 
namespace Jmk25\Controllers;

use Jmk25\App\View;

class LandingPageController {
  public static function index(){
    $model = [
      "title" => "Selamat Datang di JMK25",
      "hideSidebar" => true // Opsi tambahan jika ingin menyembunyikan sidebar di view
    ];
    
    // Pastikan path view ini benar (app/Views/pages/home/landing.php)
    View::render("/home/landing", $model);
  }
}