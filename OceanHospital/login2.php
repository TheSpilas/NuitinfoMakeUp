<?php require('actions/auth/loginAction.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3 text-center">
    <a href="index.php">Logo</a>
    <h1>Hospital Ocean</h1>
    <p class="motto">Heal the Ocean</p>
</header>
<main class="flex-grow-1 d-flex align-items-center justify-content-center">

<!-- Jeu de morpion CAPTCHA -->
<section class="about mb-4">
<div id="game-board">
       <h2>Jeu de Morpion</h2>
        <table id="morpion" border="1" style="width: 300px; height: 300px;">
            <tr>
                <td data-cell="0" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="1" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="2" style="width: 33.33%; height: 33.33%;"></td>
            </tr>
            <tr>
                <td data-cell="3" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="4" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="5" style="width: 33.33%; height: 33.33%;"></td>
            </tr>
            <tr>
                <td data-cell="6" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="7" style="width: 33.33%; height: 33.33%;"></td>
                <td data-cell="8" style="width: 33.33%; height: 33.33%;"></td>
            </tr>
        </table>
     <div id="message">C'est au tour de X !</div>
 </div>
    </section>
    <section class="principle"></section>
<div id="login-form" class="login-form-container p-4 rounded shadow hidden">
        <h2 class="text-center mb-4">Connexion</h2>
        <form method="POST">
            <?php if (isset($errorMsg)) { echo '<p class="text-danger text-center">' . $errorMsg . '</p>'; } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="hidden" name="captcha_solved" id="captcha_solved" value="true">
            <button type="submit" name="login" class="btn btn-primary w-100">Log In</button>
        </form>
        <div class="text-center mt-3">
            <a href="signup.php" class="text-decoration-none">Pas encore de compte? Inscrit-Toi !</a>
        </div>
    </div>

    </div>
</main>
<footer class="bg-dark text-white text-center py-3">
    <p>Made by TurboMakeup</p>
</footer>
<script src="assets/scripts/captcha1.js"></script>
</body>
</html>
