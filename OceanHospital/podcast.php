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
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
        .hidden {
            display: none;
        }
        .form-check-inline {
            display: inline-block;
            margin-right: 10px;
        }
        .small-video {
            max-width: 100%;
            max-height: 300px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo text-center">
            <a href="index.php">Logo</a>
            <h1>Hospital Ocean</h1>
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
                <li class="list-group-item list-group-item-action" onclick="showPodcast(this, 'Podcast avec Frederic Le Moigne', 'assets/img/podcast1.jpeg', 'assets/audio/podcast1.mp3')">Podcast avec Frederic Le Moigne</li>
                <li class="list-group-item list-group-item-action" onclick="showPodcast(this, 'Podcast avec Florian Sevellec', 'assets/img/podcast2.jpeg', 'assets/audio/podcast2.mp3')">Podcast avec Florian Sevellec</li>
                <li class="list-group-item list-group-item-action" onclick="showActivationForm()">Activer Podcast avec Oussama</li>
                <li class="list-group-item list-group-item-action disabled" id="podcast-oussama" onclick="showPodcast(this, 'Podcast avec Oussama', 'assets/video/podcast3.mp4')">Podcast avec Oussama</li>
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
                <video id="podcast-video" class="plyr small-video" controls style="display: none;">
                    <source id="video-source" src="" type="video/mp4">
                    Votre navigateur ne supporte pas l'élément vidéo.
                </video>
                <div id="activation-form" class="hidden">
                    <h4>Activer Podcast avec Oussama</h4>
                    <form class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check1">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check2">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check3">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check4">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check5">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check6">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check7">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check8">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check9">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check10">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check11">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check12">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check13">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check14">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check15">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check16">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check17">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check18">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check19">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="" id="check20">
                        </div>
                        <button type="button" class="btn btn-primary mt-3" onclick="checkActivation()">Activer</button>
                    </form>
                </div>
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

    function showPodcast(element, title, imageSrc, mediaSrc) {
        const podcastTitle = document.getElementById('podcast-title');
        const podcastImage = document.getElementById('podcast-image');
        const podcastAudio = document.getElementById('podcast-audio');
        const podcastSource = document.getElementById('podcast-source');
        const podcastVideo = document.getElementById('podcast-video');
        const videoSource = document.getElementById('video-source');
        const podcastListItems = document.querySelectorAll('#podcast-list .list-group-item');

        // Retirer la classe active de tous les éléments de la liste
        podcastListItems.forEach(item => item.classList.remove('active'));

        // Ajouter la classe active à l'élément cliqué
        element.classList.add('active');

        // Mettre à jour le contenu
        podcastTitle.innerText = title;

        if (mediaSrc.endsWith('.mp4')) {
            podcastImage.style.display = 'none';
            podcastAudio.style.display = 'none';
            podcastVideo.style.display = 'block';
            videoSource.src = mediaSrc;
            podcastVideo.load();
        } else {
            podcastImage.src = imageSrc;
            podcastSource.src = mediaSrc;
            podcastAudio.load();
            podcastImage.style.display = 'block';
            podcastAudio.style.display = 'block';
            podcastVideo.style.display = 'none';
        }

        // Cacher le formulaire d'activation
        document.getElementById('activation-form').classList.add('hidden');
    }

    function showActivationForm() {
        document.getElementById('activation-form').classList.remove('hidden');
    }

    function checkActivation() {
        const checkboxes = document.querySelectorAll('#activation-form .form-check-input');
        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
        if (allChecked) {
            localStorage.setItem('podcastOussamaActivated', 'true');
            alert('Podcast avec Oussama activé !');
            document.getElementById('podcast-oussama').classList.remove('disabled');
            document.getElementById('activation-form').classList.add('hidden');
        } else {
            alert('Veuillez cocher toutes les options pour activer le podcast.');
        }
    }

    // Vérifier si le podcast Oussama est activé
    document.addEventListener('DOMContentLoaded', function() {
        const podcastOussama = document.getElementById('podcast-oussama');
        if (localStorage.getItem('podcastOussamaActivated') !== 'true') {
            podcastOussama.classList.add('disabled');
        }
    });
</script>
<script src="assets/scripts/script.js"></script>
</body>
</html>
