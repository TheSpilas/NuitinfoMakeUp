<?php require('actions/updateGamePoints.php'); ?>
<?php include('includes/head.php'); 
require('actions/auth/securityAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ocean Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="stylesheet" href="assets/styles/game.css">
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
                <a href="login.php" class="btn btn-outline-light me-2">Se connecter</a>
                <a href="signup.php" class="btn btn-light">S'inscrire</a>
            <?php else: ?>
                <a href="actions/auth/logoutAction.php" class="btn btn-outline-light">Se déconnecter</a>
            <?php endif; ?>
        </div>
    </div>
    <p class="motto text-center mb-3">Heal the Ocean</p>
</header>

<main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div id="game-container" class="text-center">
        <img id="character" src="assets/img/corps.png" alt="Character" width="550px" height="550px">
        <img id="lung" title="Lung" class="organ" src="assets/img/lung-sick.png" data-part="lung" 
            style="top: 54%; left: 37%; width: 25%; height: 15%;">
        <img id="brain" title="Brain" class="organ" src="assets/img/brain-sick.png" data-part="brain" 
            style="top: 10%; left: 32%; height: 22%;">
        <img id="fever" title="Fever" class="organ" src="assets/img/fever-sick.png" data-part="fever" 
            style="top: 38%; left: 50%; height: 15%;">
        <img id="stomach" title="Stomach" class="organ" src="assets/img/stomach-sick.png" data-part="stomach" 
            style="top: 65%; left: 40%; height: 10%;">
    </div>

    <!-- Dynamic game interface -->
    <div id="game-interface" 
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); color:white; z-index:1000;">
        <div id="game-content" 
            style="margin:auto; position:relative; top:10%; width:70%; height:70%; background:white; color:black;">
        </div>
        <button id="close-game" style="position:absolute; top:5%; right:5%; z-index:2000;">Close</button>
    </div>
</main>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    <p>Made by TurboMakeup</p>
</footer>
<script src="assets/scripts/game.js"></script>
</body>
</html>
