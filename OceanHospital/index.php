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

    <section class="about mb-4 section-bg">
    <h1 class="text-center">Bienvenue sur Hospital Ocean</h1>
    <p class="text-center ocean-paragraph">
        "Heal the Ocean" est plus qu'un slogan, c'est une mission. Ce projet web a été conçu dans le cadre d'un challenge en collaboration 
        avec <strong>Race for Water</strong>, une association dédiée à la préservation des océans et à la lutte contre la pollution plastique.
    </p>
    <p class="text-center ocean-paragraph">
        Ensemble, nous visons à sensibiliser les individus, petits et grands, à l'importance des océans pour notre écosystème et notre survie.
        Hospital Ocean est une plateforme qui mêle apprentissage, divertissement et engagement pour faire de chaque utilisateur un acteur du changement.
    </p>
</section>
<section class="principle section-bg">
    <h2 class="text-center">Le principe du site</h2>
    <p class="text-center ocean-paragraph">
        Hospital Ocean propose une expérience éducative et ludique à travers des activités interactives telles que des jeux, des podcasts captivants,
        et des explorations virtuelles. L'objectif est de transmettre des connaissances sur les écosystèmes marins, les dangers de la pollution,
        et les solutions pour préserver nos océans.
    </p>
    <p class="text-center ocean-paragraph">
        En participant, vous contribuerez également à soutenir les initiatives de <strong>Race for Water</strong>. 
        Chaque action sur le site, qu'il s'agisse de jouer, d'apprendre ou de partager, est une étape vers un avenir où les océans seront débarrassés 
        des plastiques et autres menaces environnementales.
    </p>
    <p class="text-center ocean-paragraph">
        De plus, vous pouvez accumuler des points, participer au classement global, et découvrir comment vos efforts en ligne peuvent avoir un 
        impact concret dans la réalité. Engagez-vous dès maintenant et devenez un véritable ambassadeur de la protection des océans !
    </p>
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
