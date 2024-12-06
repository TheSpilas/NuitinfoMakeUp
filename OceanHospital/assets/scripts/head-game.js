(function () {
    const gameContent = document.getElementById('game-content');
    const gameInterface = document.getElementById('game-interface');
    const closeGameButton = document.getElementById('close-game');

    // Liste des niveaux avec leurs chaînes alimentaires
    const levels = [
        ['plancton', 'poisson', 'requin'],
        ['phytoplancton', 'zooplancton', 'anchois', 'thon', 'dauphin'],
        ['algue', 'escargot', 'crabe', 'pieuvre', 'requin'],
    ];

    let currentLevel = 0; // Niveau actuel

    // Fonction pour afficher un message
    function displayMessage(message, isSuccess = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message';
        messageDiv.style.textAlign = 'center';
        messageDiv.style.marginTop = '20px';
        messageDiv.style.padding = '10px';
        messageDiv.style.fontSize = '20px';
        messageDiv.style.color = isSuccess ? '#28a745' : '#dc3545'; // Vert pour succès, rouge pour échec
        messageDiv.style.fontWeight = 'bold';
        messageDiv.innerHTML = message;
        gameContent.appendChild(messageDiv);
    }

    function updateUserPoints(points) {
        // Send a POST request to the server
        fetch(window.location.href, { // Use the current PHP script
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `points=${points}` // Pass the points to add
        })
        .then(response => response.text()) // Process the server's response
        .then(data => {
            console.log(data); // Debug: Log the response
            if (data.includes('success')) {
                console.log('Points successfully updated!');
            } else {
                console.error('Failed to update points:', data);
            }
        })
        .catch(error => console.error('Error updating points:', error));
                
    }
    

    // Charger le niveau actuel
    function loadLevel() {
        const chain = levels[currentLevel];
        const shuffledChain = [...chain].sort(() => Math.random() - 0.5); // Mélanger les éléments

        // Modifier l'arrière-plan uniquement pour la zone de jeu
        gameContent.style.backgroundImage = "url('assets/img/backgr-game.gif')";
        gameContent.style.backgroundSize = "cover";
        gameContent.style.backgroundPosition = "center";

        // Ajouter le contenu du jeu
        gameContent.innerHTML = `
            <h2 style="text-align: center; color: #fff;">Niveau ${currentLevel + 1}</h2>
            <p style="text-align: center; color: #fff;">Glissez les éléments pour compléter la chaîne alimentaire.</p>
            <div id="drag-container" style="display: flex; gap: 10px; justify-content: center; margin: 20px 0;">
                ${shuffledChain
                    .map(
                        (item) =>
                            `<img src="assets/img/${item}.png" alt="${item}" class="draggable" draggable="true" data-item="${item}" style="width: 200px; cursor: grab;">`
                    )
                    .join('')}
            </div>
            <div id="drop-zone" style="display: flex; gap: 10px; justify-content: center; border: 2px dashed #fff; padding: 20px; min-height: 100px;">
                <!-- Les éléments glissés apparaîtront ici -->
            </div>
            <button id="submit-order" class="btn btn-primary" style="margin-top: 20px; display: block; margin-left: auto; margin-right: auto;">Valider</button>
        `;

        let userOrder = [];

        const draggables = document.querySelectorAll('.draggable');
        const dropZone = document.getElementById('drop-zone');

        draggables.forEach((item) => {
            item.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', e.target.dataset.item);
            });
        });

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault(); // Autoriser le drop
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            const data = e.dataTransfer.getData('text/plain');
            const draggedElement = document.querySelector(`[data-item="${data}"]`);

            if (draggedElement) {
                dropZone.appendChild(draggedElement);
                userOrder.push(data);
            }
        });

        document.getElementById('submit-order').addEventListener('click', () => {
            const existingMessage = gameContent.querySelector('.message');
            if (existingMessage) existingMessage.remove();

            if (JSON.stringify(userOrder) === JSON.stringify(chain)) {
                if (currentLevel < levels.length - 1) {
                    currentLevel++;
                    displayMessage('Bravo ! Niveau suivant en cours...', true);
                    setTimeout(loadLevel, 2000); // Charger le prochain niveau après 2 secondes
                } else {
                    displayMessage('Félicitations ! Vous avez gagné 500 points ! 🎉', true);
                    updateUserPoints(500); // Ajouter 500 points à l'utilisateur
                    setTimeout(() => {
                        gameInterface.style.display = 'none'; // Fermer la fenêtre de jeu
                    }, 3000); // Attendre 3 secondes avant de fermer
                }
            } else {
                displayMessage('Désolé, l\'ordre est incorrect. Réessayez !', false);
                userOrder = []; // Réinitialiser l'ordre utilisateur
                dropZone.innerHTML = ''; // Réinitialiser la zone de dépôt
                draggables.forEach((item) => dropZone.appendChild(item)); // Remettre les éléments dans le conteneur
            }
        });
    }

    // Introduction et bouton pour démarrer
    gameContent.innerHTML = `
        <h2 style="text-align: center; color: #333;">Bienvenue au Jeu des Chaînes Alimentaires</h2>
        <p style="text-align: center; color: #555;">Votre mission est de compléter plusieurs chaînes alimentaires marines. Passez chaque niveau pour réussir le jeu !</p>
        <button id="start-game-btn" class="btn btn-success" style="display: block; margin: 20px auto;">Commencer le jeu</button>
    `;

    const startGameBtn = document.getElementById('start-game-btn');
    startGameBtn.addEventListener('click', () => {
        gameInterface.style.display = 'block';
        loadLevel();
    });

    // Bouton pour fermer manuellement la fenêtre de jeu
    closeGameButton.addEventListener('click', () => {
        gameInterface.style.display = 'none';
        gameContent.innerHTML = ''; // Réinitialiser la fenêtre de jeu
    });
})();
