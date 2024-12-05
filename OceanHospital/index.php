
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
            <button class="btn btn-outline-light" id="menuButton">Menu</button>
        </div>
        <p class="motto text-center mb-0">Heal the Ocean</p>
    </header>
    <div id="sidebar" class="sidebar">
        <button class="btn-close" id="closeSidebar">&times;</button>
        <ul class="nav flex-column text-white">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Jeux</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Podcast</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Crédit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Classement</a>
            </li>
        </ul>
    </div>
    <main class="container my-5 flex-grow-1">
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