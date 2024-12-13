<style>
  /* Header */
        /* Style du header */
        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            font-family: 'Arial', sans-serif;
            position: sticky; /* Fixe le header */
            top: 0; /* Le fixer en haut de la page */
            z-index: 1000; /* Assurez-vous qu'il reste au-dessus des autres éléments */
            width: 100%; /* Prendre toute la largeur */
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

        .navbar li:first-child {
            margin-left: 0;
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
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="../admin/admin.php" class="logo-link">Application d'articles</a>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                    <li><a href="about.php" class="nav-link">À propos</a></li>
                    <li><a href="javascript:void(0);" class="nav-link">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
