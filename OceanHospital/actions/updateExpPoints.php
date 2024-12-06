<?php
require('actions/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Check if it's a POST request
    if (isset($_POST['points']) && is_numeric($_POST['points'])) {
        $pointsToAdd = intval($_POST['points']); // Sanitize points input

        // Update the user's points in the database
        $updateUserPoints = $bdd->prepare('UPDATE users SET explore_points = explore_points + ? WHERE id = ?');
        $updateUserPoints->execute(array($pointsToAdd, $_SESSION['id']));

        // Update the points in the session for consistency
        $_SESSION['explore_points'] += $pointsToAdd;

        // Respond with success message
        echo 'success';
    } else {
        // Respond with an error if points input is invalid
        echo 'Invalid points value.';
    }
    exit; // Ensure no further output is sent
}
?>