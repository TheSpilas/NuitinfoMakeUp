<?php
include('includes/head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ocean Hospital - Podcasts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <style>
        .list-group-item.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php" class="text-white text-decoration-none">
                <h1>Hospital Ocean</h1>
            </a>
        </div>
        <div class="auth-buttons text-center">
            <a href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
            <a href="signup.php" class="btn btn-light">S'inscrire</a>
        </div>
    </div>
    <p class="motto text-center mb-3">Heal the Ocean</p>
</header>
<main class="container my-5 flex-grow-1">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group" id="podcast-list">
                <li class="list-group-item list-group-item-action" onclick="showPodcast(this, 'Podcast avec Frederic Le Moigne', 'assets/image/podcast1.jpeg', 'assets/audio/podcast1.mp3')">Podcast avec Frederic Le Moigne</li>
                <li class="list-group-item list-group-item-action" onclick="showPodcast(this, 'Podcast avec Florian Sevellec', 'assets/image/podcast2.jpeg', 'assets/audio/podcast2.mp3')">Podcast avec Florian Sevellec</li>
                <!-- Ajoutez plus de podcasts ici -->
            </ul>
        </div>
        <div class="col-md-8">
            <div id="podcast-details" class="text-center">
                <h3 id="podcast-title">Sélectionnez un podcast</h3>
                <img id="podcast-image" src="" alt="" class="img-fluid img-thumbnail rounded mb-3" style="display: none;">
                <audio id="podcast-audio" class="plyr" controls style="display: none;">
                    <source id="podcast-source" src="" type="audio/mpeg">
                    Votre navigateur ne supporte pas l'élément audio.
                </audio>
            </div>
        </div>
    </div>
</main>
<footer class="bg-dark text-white text-center py-3">
    <p>Made by TurboMakeup</p>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
<script>
    const players = Plyr.setup('.plyr');

    function showPodcast(element, title, imageSrc, audioSrc) {
        const podcastTitle = document.getElementById('podcast-title');
        const podcastImage = document.getElementById('podcast-image');
        const podcastAudio = document.getElementById('podcast-audio');
        const podcastSource = document.getElementById('podcast-source');
        const podcastListItems = document.querySelectorAll('#podcast-list .list-group-item');

        // Retirer la classe active de tous les éléments de la liste
        podcastListItems.forEach(item => item.classList.remove('active'));

        // Ajouter la classe active à l'élément cliqué
        element.classList.add('active');

        // Mettre à jour le contenu
        podcastTitle.innerText = title;
        podcastImage.src = imageSrc;
        podcastSource.src = audioSrc;
        podcastAudio.load();

        // Afficher les éléments
        podcastImage.style.display = 'block';
        podcastAudio.style.display = 'block';
    }
</script>
<script src="assets/scripts/script.js"></script>
</body>
</html>