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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --background-url: url('../../assets/img/default-background.jpg');
        }

        body{
        color: white;
        }

        body.light {
            color: #000;
        }

        body.dark::before {
            background : url('assets/img/background-dark.jpg')no-repeat center center;
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -1; /* Place l'image en arrière-plan */
        }

        body.multicolor::before {
            background : url('assets/img/background-r.jpg')no-repeat center center;
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            z-index: -1; /* Place l'image en arrière-plan */
        }

        .btn-theme {
            margin: 10px;
        }

        .image-grid {
            text-align: center;
        }

        h1 {
            color: #e83e8c;
        }

        .image-grid img {
            width: 300px;
            height: auto;
            margin: 10px;
            border-radius: 10px;
            transition: transform 0.2s ease-in-out;
        }

        .image-grid img:hover {
            transform: scale(1.1);
        }

        .image-grid .liza {
            width: 450px;
        }

        .speech-bubble {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            visibility: hidden;
            z-index: 1;
        }

        .image-container:hover .speech-bubble {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }

        .image-name {
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: bold;
        }

        .scroll-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #e83e8c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .end-space {
            height: 50px;
        }

                /* Animation de tremblement */
    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-10px); }
        100% { transform: translateX(0); }
    }
    
    /* Application de l'animation au survol des images */
    .image-grid img:hover {
        animation: shake 0.5s ease-in-out;
        animation-iteration-count: infinite; /* L'animation tremble en boucle */
    }
    </style>
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body class="light">
<header style="background-color: var(--header-color);" class="text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.php" class="text-white text-decoration-none">
                <h1>Hospital Ocean</h1>
            </a>
        </div>
        <div class="auth-buttons">
            <a href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
            <a href="signup.php" class="btn btn-light">S'inscrire</a>
        </div>
    </div>
    <p class="motto text-center mb-3">Heal the Ocean</p>
</header>

<div class="container text-center py-4">
    <h1 class="mb-4">Changer de thème</h1>
    <button onclick="changeTheme('light')" class="btn btn-light btn-theme">Thème Clair</button>
    <button onclick="changeTheme('dark')" class="btn btn-dark btn-theme">Thème Sombre</button>
    <button onclick="changeTheme('multicolor')" class="btn btn-primary btn-theme">Thème Multicolore</button>
</div>

<div class="container image-grid">
        <div class="row">
            <!-- Première ligne (2 images) -->
            <div class="col-6">
                <a href="https://github.com/RemiRoutier" target="blank"><img src="assets/img/remi.png" alt="rémi"></a>
                <div class="speech-bubble">Rémi Routier</div>
                <div class="image-name">Rémi</div>
            </div>
            <div class="col-6">
                <a href="https://github.com/ciluuu" target="blank"><img src="assets/img/lucie.png" alt="lucie"></a>
                <div class="speech-bubble">Lucie Monneret</div>
                <div class="image-name">Lucie</div>
            </div>
        </div>
        <div class="row">
            <!-- Deuxième ligne (3 images) -->
            <div class="col-4">
                <a href="https://github.com/TheSpilas" target="blank"><img src="assets/img/arnaud2.png" class="liza" alt="arnaud"></a>
                <div class="speech-bubble">Arnaud Gautheret</div>
                <div class="image-name">Arnaud</div>
            </div>
            <div class="col-4">
                <a href="https://github.com/Spectral-V" target="blank"><img src="assets/img/victor2.png" class="liza" alt="victor"></a>
                <div class="speech-bubble">Victor Murris</div>
                <div class="image-name">Victor</div>
            </div>
            <div class="col-4">
                <a href="https://github.com/liza-b-13" target="blank"><img src="assets/img/liza.png" class= "liza" alt="liza"></a>
                <div class="speech-bubble">Liza Bouarab</div>
                <div class="image-name">Liza</div>
            </div>
        </div>
        <div class="row">
            <!-- Troisième ligne (4 images) -->
            <div class="col-3">
                <a href="https://github.com/sirineeeeee" target="blank"><img src="assets/img/sirine.png" alt="sirine"></a>
                <div class="speech-bubble">Sirine Ben Charnia</div>
                <div class="image-name">Sirine</div>
            </div>
            <div class="col-3">
                <a href="https://github.com/lexi9999" target="blank"><img src="assets/img/alexis.png" alt="alexis"></a>
                <div class="speech-bubble">Alexis Ibrahim</div>
                <div class="image-name">Alexis</div>
            </div>
            <div class="col-3">
                <a href="https://github.com/mameth" target="blank"><img src="assets/img/mame.png" alt="mame"></a>
                <div class="speech-bubble">Mame Thiam</div>
                <div class="image-name">Mame</div>
            </div>
            <div class="col-3">
                <a href="https://github.com/Alban283746" target="blank"><img src="assets/img/alban.png" alt="alban"></a>
                <div class="speech-bubble">Alban Gaillot</div>
                <div class="image-name">Alban</div>
            </div>
        </div>
    </div>


<div class="end-space"></div>

<button class="scroll-button" onclick="scrollPage()">Défiler la page</button>

<footer class="bg-dark text-white text-center py-3">
    <p>Made by TurboMakeup</p>
</footer>

<script>
    function changeTheme(themeClass, backgroundUrl) {
        document.body.className = themeClass;
        document.documentElement.style.setProperty('--background-url', `url('${backgroundUrl}')`);
    }

    function scrollPage() {
        window.scrollBy({
            top: window.innerHeight,
            behavior: 'smooth'
        });
    }
</script>
</body>
</html>
