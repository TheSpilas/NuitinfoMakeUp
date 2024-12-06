const organs = document.querySelectorAll('.organ');
const gameInterface = document.getElementById('game-interface');
const gameContent = document.getElementById('game-content');
const closeGameButton = document.getElementById('close-game');

// Statut des organes
const bodyParts = {
    head: false, // false = sick, true = healed
    arm: false,
    // Ajoutez d'autres organes ici
};

// Ajoute un écouteur d'événement pour chaque organe
organs.forEach(organ => {
    organ.addEventListener('click', () => {
        const part = organ.dataset.part;
        if (!bodyParts[part]) { // Si l'organe n'est pas encore guéri
            loadMiniGame(part, organ);
        }
    });
});

function loadMiniGame(part, organ) {
    // Affiche l'interface du mini-jeu
    gameInterface.style.display = 'block';
    gameContent.innerHTML = `<p>Loading mini-game for ${part}...</p>`;

    // Charge dynamiquement le fichier JavaScript spécifique
    const script = document.createElement('script');
    script.src = `assets/scripts/${part}-game.js`;
    script.onload = () => {
        console.log(`${part}-game.js loaded successfully`);
    };
    script.onerror = () => {
        alert(`Failed to load the mini-game for ${part}.`);
        gameInterface.style.display = 'none';
    };
    document.body.appendChild(script);
}

function onMiniGameSuccess(part, organ) {
    // Une fois le mini-jeu réussi
    gameInterface.style.display = 'none';
    gameContent.innerHTML = '';

    // Met à jour l'état de l'organe
    bodyParts[part] = true;
    organ.src = `${part}-healed.png`; // Change l'image en "healed"
}

// Bouton pour fermer le mini-jeu
closeGameButton.addEventListener('click', () => {
    gameInterface.style.display = 'none';
    gameContent.innerHTML = '';
});
