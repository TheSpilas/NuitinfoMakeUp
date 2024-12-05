<?php require('actions/auth/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Hospital Ocean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>
<body class="d-flex flex-column min-vh-100">
<header style="background-color: var(--header-color);" class="text-white py-3 text-center">
    <a href="index.php">Logo</a>
    <h1>Hospital Ocean</h1>
    <p class="motto">Heal the Ocean</p>
</header>
<main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="signup-form-container p-4 rounded shadow">
        <h2 class="text-center mb-4">Inscription</h2>
        <form method="POST">
            <?php if (isset($errorMsg)) { echo '<p class="text-danger text-center">' . $errorMsg . '</p>'; } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary w-100">S'inscrire</button>
        </form>
        <div class="text-center mt-3">
            <a href="login.php" class="text-decoration-none">Tu as déjà un compte? Connecte-Toi !</a>
        </div>
    </div>
</main>
<footer class="bg-dark text-white text-center py-3">
    <p>Made by TurboMakeup</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
