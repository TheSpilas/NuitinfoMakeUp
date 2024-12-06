<?php
// Vérifiez si une session est déjà active avant de démarrer une nouvelle session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit; // Ajout d'un exit pour s'assurer que le script s'arrête après la redirection
}
?>
