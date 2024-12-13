<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Charger le fichier JSON
    $json_data = file_get_contents('../data/users.json');
    $users = json_decode($json_data, true);

    // Récupérer les données soumises
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: index.php'); // Redirige vers la page d'accueil
            exit;
        }
    }

    // Si la connexion échoue
    $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <style>
      /* Style général */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #ffffff;
    width: 100%;
    max-width: 400px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333333;
}

.login-form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #555555;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.login-btn {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.login-btn:hover {
    background-color: #0056b3;
}

.error {
    color: #ff0000;
    margin-bottom: 15px;
    font-size: 14px;
}

.logout-btn {
    margin-top: 15px;
    display: inline-block;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
}

.logout-btn:hover {
    text-decoration: underline;
}

/* Responsive design */
@media (max-width: 480px) {
    .login-container {
        padding: 15px;
    }
}

    </style>
</head>
<body>
    <div class="login-container">
        <h1>Connexion</h1>
        <?php if (!empty($error_message)): ?>
            <p class="error"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="login-btn">Se connecter</button>
        </form>
    </div>
</body>
</html>
