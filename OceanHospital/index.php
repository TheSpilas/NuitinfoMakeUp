
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
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
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
        <nav class="navbar navbar-expand-md justify-content-center">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item px-3">
                    <a class="nav-link text-white d-flex align-items-center" href="#">
                        <img src="assets/pixel-jeux.png" alt="Jeux" class="me-2" width="20">
                        Jeux
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white d-flex align-items-center" href="#">
                        <img src="assets/pixel-podcast.png" alt="Podcast" class="me-2" width="20">
                        Podcast
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white d-flex align-items-center" href="#">
                        <img src="assets/pixel-credit.png" alt="Crédit" class="me-2" width="20">
                        Crédit
                    </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white d-flex align-items-center" href="#">
                        <img src="assets/pixel-classement.png" alt="Classement" class="me-2" width="20">
                        Classement
                    </a>
                </li>
            </ul>
        </div>
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