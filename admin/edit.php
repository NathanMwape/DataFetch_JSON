<?php

$file = '../data/articles.json';
$articles = json_decode(file_get_contents($file), true);
$id = $_GET['id'] ?? null;
$article = null;
if ($id) {
    // Filtrer les articles et vérifier s'il y a des résultats
    $filteredArticles = array_filter($articles, fn($a) => $a['id'] == $id);
    $article = !empty($filteredArticles) ? array_values($filteredArticles)[0] : null;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gestion de l'upload de l'image
    $imagePath = $article['image'] ?? null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/'; // Dossier cible
        $fileName = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;

        // Déplacement du fichier uploadé
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = '/projet1/uploads/' . $fileName; // Chemin relatif
        }
    }

    $newArticle = [
        'id' => $id ? $id : (count($articles) ? max(array_column($articles, 'id')) + 1 : 1),
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'date' => date('Y-m-d'),
        'image' => $imagePath,
    ];

    if ($id) {
        foreach ($articles as &$a) {
            if ($a['id'] == $id) {
                $a = $newArticle;
                break;
            }
        }
    } else {
        $articles[] = $newArticle;
    }

    file_put_contents($file, json_encode($articles, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}

include 'includes/header.php';
?>

<style>
    /* Style général du formulaire */
.form-container {
    max-width: 800px;
    margin: 40px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-title {
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Formulaire et champs */
.article-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-group label {
    font-size: 1rem;
    color: #333;
}

.form-group input, .form-group textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    color: #333;
}

.form-group input[type="file"] {
    padding: 5px;
}

textarea {
    min-height: 150px;
    resize: vertical;
}

/* Bouton de soumission */
.submit-btn {
    padding: 12px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background-color: #218838;
}

/* Image prévisualisation */
.image-preview {
    margin-top: 10px;
    text-align: center;
}

.image-preview img {
    border-radius: 5px;
}

/* Retour au bouton admin */
.back-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1rem;
    text-align: center;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: #0056b3;
}

/* Responsive */
@media (max-width: 600px) {
    .form-container {
        padding: 15px;
        margin: 20px;
    }

    .form-title {
        font-size: 1.5rem;
    }

    .article-form {
        gap: 15px;
    }
}

</style>
<div class="form-container">
    <h1 class="form-title"><?= $id ? 'Modifier' : 'Ajouter' ?> un article</h1>
    
    <form method="POST" enctype="multipart/form-data" class="article-form">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" placeholder="Titre de l'article" value="<?= $article['title'] ?? '' ?>" required>
        </div>
        
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" placeholder="Contenu de l'article" required><?= $article['content'] ?? '' ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            <?php if (!empty($article['image'])): ?>
                <div class="image-preview">
                    <img src="<?= $article['image'] ?>" alt="Image de l'article" width="150">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="submit-btn"><?= $id ? 'Modifier' : 'Ajouter' ?> l'article</button>
    </form>

    <a href="admin.php" class="back-btn">Retour à l'admin</a>
</div>


<?php include 'includes/footer.php'; ?>