<?php
require('actions/database.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if it's a POST request
    if (isset($_POST['points']) && is_numeric($_POST['points'])) {
        $pointsToAdd = intval($_POST['points']); // Sanitize points input

        // Update the user's points in the database
        $updateUserPoints = $bdd->prepare('UPDATE users SET game_points = game_points + ? WHERE id = ?');
        $updateUserPoints->execute(array($pointsToAdd, $_SESSION['id']));

        // Update the points in the session for consistency
        $_SESSION['game_points'] += $pointsToAdd;

        // Respond with success message
        echo 'success';
    } else {
        // Respond with an error if points input is invalid
        echo 'Invalid points value.';
    }
    exit; // Ensure no further output is sent
}
?>