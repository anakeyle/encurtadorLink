<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class DashController extends Controller
{



public function salvar() {
  if($_SERVER['REQUEST_METHOD'] === "POST"){

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $shortCode = '';
    for ($i = 0; $i < 8; $i++) {
        $shortCode .= $characters[rand(0, $charactersLength - 1)];
    }
  }
}
}
  
    // Gerar código aleatório
    $codigo = substr(md5(uniqid(rand(), true)), 0, 6); // Gera um código único de 6 caracteres

    // Verificar se o código já existe
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM urls WHERE url_encurtada = ?");
    $stmt->execute([$codigo]);
    $result = $stmt->fetchColumn();

    // Se o código já existe, gerar um novo
    while ($result > 0) {
        $codigo = substr(md5(uniqid(rand(), true)), 0, 6);
        $stmt->execute([$codigo]);
        $result = $stmt->fetchColumn();
    }

    // Inserir no banco de dados
    $stmt = $pdo->prepare("INSERT INTO urls (url_original, url_encurtada) VALUES (?, ?)");
    $stmt->execute([$url_original, $codigo]);

    // Exibir o link encurtado
    echo "URL encurtada: <a href='/s/$codigo'>/$codigo</a>";










    //$sql = "INSERT INTO links (url, link) VALUES (:url, :link)";




   //echo "http://localhost/".$shortCode;
   //echo "<br>";
   //echo $_POST['url'];
   ?>
 