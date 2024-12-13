<?php
$articles = json_decode(file_get_contents('../data/articles.json'), true);
$id = $_GET['id'] ?? null;
$article = array_filter($articles, fn($a) => $a['id'] == $id);

if (!$article) {
    die('Article introuvable.');
}

$article = array_values($article)[0];
include 'includes/header.php';
?>
<style>
  /* Style pour la page de l'article */
.article-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.article-title {
    font-size: 2rem;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

.article-image {
    text-align: center;
    margin-bottom: 20px;
}

.article-img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.article-content {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

.article-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.9rem;
    color: #777;
}

.publish-date {
    font-style: italic;
}

.back-btn {
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 600px) {
    .article-container {
        padding: 15px;
        margin: 20px;
    }

    .article-title {
        font-size: 1.5rem;
    }

    .article-content {
        font-size: 1rem;
    }
}

</style>
<div class="article-container">
    <h1 class="article-title"><?= $article['title'] ?></h1>

    <?php if (!empty($article['image'])): ?>
        <div class="article-image">
            <img src="<?= $article['image'] ?>" alt="Image de l'article" width="400" class="article-img">
        </div>
    <?php endif; ?>

    <div class="article-content">
        <p><?= $article['content'] ?></p>
    </div>

    <div class="article-footer">
        <small class="publish-date">Publié le : <?= $article['date'] ?></small>
        <a href="index.php" class="back-btn">Retour aux articles</a>
    </div>
</div>
