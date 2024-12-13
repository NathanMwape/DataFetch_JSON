<?php

session_start();

if (empty($_SESSION['loggedin'])) {
    header('Location: login.php'); // Redirige vers la page de connexion
    exit;
}
$articles = json_decode(file_get_contents('../data/articles.json'), true);
include 'includes/header.php';
?>
<style>
/* Style général */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Titre principal */
.title {
    font-size: 2rem;
    margin-bottom: 20px;
    text-align: center;
    color: #444;
}

/* Liste des articles */
.article-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.article-item {
    display: flex;
    flex-direction: row;
    gap: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 20px;
    background: #fafafa;
}

.article-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}

.article-title {
    font-size: 1.2rem;
    color: #333;
    margin: 0;
}

.article-image {
    max-width: 200px;
    height: auto;
    border-radius: 5px;
}

.article-content {
    font-size: 0.9rem;
    color: #555;
    margin: 10px 0;
}

.article-date {
    font-size: 0.8rem;
    color: #999;
}

/* Actions - Les boutons à gauche et à droite */
.article-actions {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    width: 100%;
    margin-top: 10px;
}

.btn {
    text-decoration: none;
    font-size: 0.8rem;
    padding: 6px 10px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
    text-align: center;
}

.btn-add {
    background: #28a745;
    color: white;
    display: inline-block;
    margin-bottom: 20px;
}

.btn-edit {
    background: #007bff;
    color: white;
    width: 48%;
}

.btn-delete {
    background: #dc3545;
    color: white;
    width: 48%;
}

/* Hover effects */
.btn:hover {
    opacity: 0.8;
}

/* Responsive */
@media (max-width: 600px) {
    .container {
        padding: 15px;
    }

    .article-item {
        flex-direction: column;
        align-items: center;
    }

    .article-info {
        width: 100%;
    }

    .article-actions {
        flex-direction: column;
        margin-top: 15px;
    }

    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}


</style>
<div class="container">
    <h1 class="title">Gestion des articles</h1>
    <a href="edit.php" class="btn btn-add">+ Ajouter un article</a>
    
    <ul class="article-list">
        <?php foreach ($articles as $article): ?>
            <li class="article-item">
                <div class="article-image-container">
                    <?php if (!empty($article['image'])): ?>
                        <img src="<?= htmlspecialchars($article['image']) ?>" alt="Image de l'article" class="article-image">
                    <?php endif; ?>
                </div>
                <div class="article-info">
                    <h2 class="article-title"><?= htmlspecialchars($article['title']) ?></h2>
                    <p class="article-content"><?= htmlspecialchars($article['content']) ?></p>
                    <small class="article-date">(Publié le : <?= htmlspecialchars($article['date']) ?>)</small>
                    <div class="article-actions">
                        <a href="edit.php?id=<?= $article['id'] ?>" class="btn btn-edit">Modifier</a>
                        <a href="delete.php?id=<?= $article['id'] ?>" class="btn btn-delete" 
                           onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">Supprimer</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


<?php include 'includes/footer.php'; ?>
