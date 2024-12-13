<?php
$file = '../data/articles.json';
$articles = json_decode(file_get_contents($file), true);
$id = $_GET['id'] ?? null;

if ($id) {
    $articles = array_filter($articles, fn($a) => $a['id'] != $id);
    file_put_contents($file, json_encode(array_values($articles), JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
} else {
    die('ID invalide ou article introuvable.');
}
?>
