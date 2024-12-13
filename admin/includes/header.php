<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application d'articles</title>
    <style>
        /* Style du header */
        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            font-family: 'Arial', sans-serif;
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo a {
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navbar li {
            margin-left: 20px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            text-transform: uppercase;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: #28a745;
        }

        .logout-button {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            border: none;
            background: none;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #ff4b5c;
        }

        /* Menu mobile */
        @media (max-width: 768px) {
            .navbar ul {
                flex-direction: column;
                text-align: center;
            }

            .navbar li {
                margin: 10px 0;
            }

            .logo a {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="../admin/admin.php" class="logo-link">ArticlesApp</a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">Admin</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">À propos</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">Contact</a></li>
                </ul>
            </nav>

            <!-- Bouton de déconnexion -->
            <button onclick="logout()" class="logout-button">Déconnexion</button>
        </div>
    </header>

    <script>
        function logout() {
            // Redirige vers la page logout.php où la déconnexion est gérée
            window.location.href = 'logout.php';
        }
    </script>
</body>

</html>
