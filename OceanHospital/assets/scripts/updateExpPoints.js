// Simulate a database update for the user
function updateUserPoints(points) {
    // Send a POST request to the server
    fetch(window.location.href, { // Use the current PHP script
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `exp_points=${points}` // Pass the points to add
    })
    .then(response => response.text()) // Process the server's response
    .then(data => {
        console.log(data); // Debug: Log the response
        if (data.includes('success')) {
            console.log('Points successfully updated!');
            alert(`Vous avez obtenu ${points} points d'exploration`);
        } else {
            console.error('Failed to update points:', data);
        }
    })
    .catch(error => console.error('Error updating points:', error));
}
