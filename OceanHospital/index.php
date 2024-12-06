<?php
include('includes/head.php');
?>
<?php
require('actions/database.php'); // Inclure votre fichier de connexion à la base de données
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ocean Hospital</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php" class="text-white text-decoration-none">
                <h1>Hospital Ocean</h1>
            </a>
        </div>
        <div class="auth-buttons">
        <?php if (!isset($_SESSION['auth']) || $_SESSION['auth'] === 'true'): ?>
        <!-- Show login and signup buttons if the user is not logged in -->
        <a href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
        <a href="signup.php" class="btn btn-light">S'inscrire</a>
        <?php else: ?>
        <!-- Optionally, show a logout button or a user profile link -->
        <a href="actions/auth/logoutAction.php" class="btn btn-outline-light">Se déconnecter</a>
        <?php endif; ?>
        </div>
    </div>
    <p class="motto text-center mb-3">Heal the Ocean</p>
</header>
<main class="container my-5 flex-grow-1">
    <nav class="navbar d-flex justify-content-center">
        <ul class="d-flex flex-wrap justify-content-center list-unstyled gap-3">
            <li class="nav-item">
                <a class="nav-link" href="game.php">
                    <img src="assets/img/pixel-jeux.png" alt="Jeux">
                    <span>Jeux</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="podcast.php">
                    <img src="assets/img/pixel-podcast.png" alt="Podcast">
                    <span>Podcast</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="credit.php">
                    <img src="assets/img/pixel-credit.png" alt="Crédit">
                    <span>Crédit</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="classement.php">
                    <img src="assets/img/pixel-classement.png" alt="Classement">
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
