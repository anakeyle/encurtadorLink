<?php

namespace App\controllers;

use Core\Controller;
use Core\Database;

class UrlController extends Controller
{
    public function encurtar()
    {
      if($_SERVER['REQUEST_METHOD'] === "POST"){
        session_start();
        $db = Database::connect();

        $url = $_POST['url'];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $shortCode = '';
            for ($i = 0; $i < 8; $i++) {
                  $shortCode .= $characters[rand(0, $charactersLength - 1)];
              }
            }
    
      // Gerar código aleatório
      $codigo = substr(md5(uniqid(rand(), true)), 0, 6);

      $stm = $db->prepare("INSERT INTO links (long_url,short_code) VALUES (:long_url, :short_code )");
      
      $_SESSION['shorturl'] = $shortCode;
      $stm->bindParam(":long_url", $url);
      $stm->bindParam(":short_code", $shortCode);
     
        if($stm->execute()) {
          $this->view('/home/index');
        }
      }
  
     

    public function redirecionar($code)
    {
        $urlModel = new Url();
        $longUrl = $urlModel->getlonglUrl($code);

        if ($longUrl) {
            header("Location: $longUrl");
            exit;
        } else {
            echo "URL não encontrada!";
        }
    }
}
