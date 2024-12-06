<?php
include('includes/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ocean Hospital</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <style>
        /* Étendre l'image de fond sur toute la page */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: url('assets/img/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Suppression du fond du main */
        main {
            padding: 20px;
        }

        /* Texte lisible sur le fond */
        section, nav {
            color: white;
        }

        /* Optionnel : Ajout d'ombres pour améliorer la lisibilité */
        h1, h2, p {
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php">Logo</a>
            <h1>Hospital Ocean</h1>
        </div>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
            <a href="signup.php" class="btn btn-light">S'inscrire</a>
        </div>
    </div>
    <p class="motto text-center mb-3">Heal the Ocean</p>
</header>
<main class="container my-5 flex-grow-1">
    <nav class="navbar d-flex justify-content-center">
        <ul class="d-flex flex-wrap justify-content-center list-unstyled gap-3">
            <li class="nav-item">
                <a class="nav-link text-white d-flex flex-column align-items-center p-3" href="game.php">
                    <img src="assets/img/pixel-jeux.png" alt="Jeux" class="mb-2" width="40">
                    <span>Jeux</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex flex-column align-items-center p-3" href="#">
                    <img src="assets/img/pixel-podcast.png" alt="Podcast" class="mb-2" width="40">
                    <span>Podcast</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex flex-column align-items-center p-3" href="#">
                    <img src="assets/img/pixel-credit.png" alt="Crédit" class="mb-2" width="40">
                    <span>Crédit</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white d-flex flex-column align-items-center p-3" href="#">
                    <img src="assets/img/pixel-classement.png" alt="Classement" class="mb-2" width="40">
                    <span>Classement</span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="about mb-4">
        <h1 class="text-center">Bienvenue sur Hospital Ocean</h1>
        <p class="text-center">Heal the Ocean : Un projet dédié à la sensibilisation et à l'action pour préserver nos océans.</p>
    </section>
    <section class="principle">
        <h2 class="text-center">Le principe du site</h2>
        <p class="text-center">Découvrez comment participer, apprendre et contribuer à travers des jeux interactifs, des podcasts éducatifs, et bien plus.</p>
    </section>
</main>
<footer class="bg-dark text-white text-center py-3">
    <p>Made by TurboMakeup</p>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/scripts/script.js"></script>
</body>
</html>
