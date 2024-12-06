<?php
require('actions/database.php'); // Inclure votre fichier de connexion à la base de données

// Récupérer les meilleurs joueurs pour game_points
try {
    $getGamePointsRanking = $bdd->prepare('SELECT username, game_points FROM users ORDER BY game_points DESC LIMIT 10');
    $getGamePointsRanking->execute();
    $gamePointsPlayers = $getGamePointsRanking->fetchAll();
    
    // Récupérer les meilleurs joueurs pour explore_points
    $getExplorePointsRanking = $bdd->prepare('SELECT username, explore_points FROM users ORDER BY explore_points DESC LIMIT 10');
    $getExplorePointsRanking->execute();
    $explorePointsPlayers = $getExplorePointsRanking->fetchAll();
} catch (Exception $e) {
    die('Erreur lors de la récupération des données : ' . $e->getMessage());
}
include('includes/head.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement des Meilleurs Joueurs</title>
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

<div class="container2 d-flex flex-column">
    <h1>Classement des Meilleurs Joueurs</h1>
    <div class="tabs">
        <button id="game-tab" class="active" onclick="showRanking('game')">Classement Game Points</button>
        <button id="explore-tab" onclick="showRanking('explore')">Classement Explore Points</button>
    </div>

    <!-- Classement Game Points -->
    <div id="game-ranking">
        <h2>Classement par Game Points</h2>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Nom d'utilisateur</th>
                    <th>Game Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($gamePointsPlayers) > 0) {
                    $position = 1;
                    foreach ($gamePointsPlayers as $player) {
                        echo '<tr>';
                        echo '<td>' . $position . '</td>';
                        echo '<td>' . htmlspecialchars($player['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($player['game_points']) . '</td>';
                        echo '</tr>';
                        $position++;
                    }
                } else {
                    echo '<tr><td colspan="3">Aucun joueur trouvé.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Classement Explore Points -->
    <div id="explore-ranking" style="display:none;">
        <h2>Classement par Explore Points</h2>
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Nom d'utilisateur</th>
                    <th>Explore Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($explorePointsPlayers) > 0) {
                    $position = 1;
                    foreach ($explorePointsPlayers as $player) {
                        echo '<tr>';
                        echo '<td>' . $position . '</td>';
                        echo '<td>' . htmlspecialchars($player['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($player['explore_points']) . '</td>';
                        echo '</tr>';
                        $position++;
                    }
                } else {
                    echo '<tr><td colspan="3">Aucun joueur trouvé.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<footer>
    <p>Made by TurboMakeup</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Gestion des onglets
    function showRanking(type) {
        const gameRanking = document.getElementById('game-ranking');
        const exploreRanking = document.getElementById('explore-ranking');
        const gameTab = document.getElementById('game-tab');
        const exploreTab = document.getElementById('explore-tab');

        if (type === 'game') {
            gameRanking.style.display = 'block';
            exploreRanking.style.display = 'none';
            gameTab.classList.add('active');
            exploreTab.classList.remove('active');
        } else {
            gameRanking.style.display = 'none';
            exploreRanking.style.display = 'block';
            gameTab.classList.add('active');
            exploreTab.classList.remove('active');
        }
    }
</script>
</body>
</html>
