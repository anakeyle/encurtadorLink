<?php

namespace App\models;

use PDO;

class Url
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=shortener', 'root', '');
    }

    public function createShortUrl($longUrl)
    {
        // Verificar se já existe
        $stmt = $this->db->prepare("SELECT short_code FROM urls WHERE long_url = :long_url");
        $stmt->execute(['long_url' => $longUrl]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['short_code'];
        }

        // Gerar código único
        $shortCode = substr(md5($longUrl . time()), 0, 6);

        $stmt = $this->db->prepare("INSERT INTO urls (long_url, short_code) VALUES (:long_url, :short_code)");
        $stmt->execute(['long_url' => $longUrl, 'short_code' => $shortCode]);

        return $shortCode;
    }

    public function getlongUrl($shortCode)
    {
        $stmt = $this->db->prepare("SELECT long_url FROM links WHERE short_code = :short_code");
        $stmt->execute(['short_code' => $shortCode]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['long_url'] ?? null;
    }
}


