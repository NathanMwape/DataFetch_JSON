<?php
$articles = json_decode(file_get_contents('../data/articles.json'), true);
include 'includes/header.php';
?>
<style>
    /* Style global */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        width: 80%;
        max-width: 1200px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 30px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    .article-item {
        display: flex;
        flex-direction: row;
        gap: 20px;
        margin-bottom: 40px;
        padding: 20px;
        border-radius: 8px;
        background: #fafafa;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .article-image {
        max-width: 200px;
        height: auto;
        border-radius: 8px;
    }

    .article-content {
        flex: 1;
    }

    .article-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 15px;
        text-decoration: none;
    }

    .article-title:hover {
        color: #007bff;
    }

    .article-date {
        color: #999;
        font-size: 0.9rem;
        margin-top: 15px;
    }

    .article-text {
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .article-item:hover {
        background: #eef2f5;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .article-item {
            flex-direction: column;
        }

        .article-image {
            max-width: 100%;
            margin-bottom: 15px;
        }
    }
</style>

<div class="container">
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li class="article-item">
                <?php if (!empty($article['image'])): ?>
                    <img src="<?= htmlspecialchars($article['image']) ?>" alt="Image de l'article" class="article-image">
                <?php endif; ?>
                <div class="article-content">
                    <a href="article.php?id=<?= $article['id'] ?>" class="article-title"><?= htmlspecialchars($article['title']) ?></a>
                    <p class="article-text"><?= htmlspecialchars(substr($article['content'], 0, 100)) ?>...</p>
                    <small class="article-date">(Publié le : <?= htmlspecialchars($article['date']) ?>)</small>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>
