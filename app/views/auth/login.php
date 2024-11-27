<!-- shorten.php -->
<?php
include 'db.php';

// Função para gerar o código curto
function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $shortCode = '';
    for ($i = 0; $i < $length; $i++) {
        $shortCode .= $characters[rand(0, $charactersLength - 1)];
    }
    return $shortCode;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
    $url = $_POST['url'];

    // Gera um código curto
    $shortCode = generateShortCode();

    // Insere a URL e o código curto no banco de dados
    $stmt = $db->prepare("INSERT INTO links (url, short_code) VALUES (?, ?)");
    $stmt->execute([$url, $shortCode]);

    // Redireciona para a página principal com o código curto gerado
    header("Location: index.php?short_code=$shortCode");
    exit;
}
?>


