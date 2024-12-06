(function() {
    const gameContent = document.getElementById('game-content');

    // Ajout de l'image de fond spécifique au mini-jeu (GIF animé)
    gameContent.style.backgroundImage = 'url("assets/img/corail/fond1.gif")';
    gameContent.style.backgroundSize = 'cover';
    gameContent.style.backgroundPosition = 'center';

    // Contenu HTML du jeu (sans le bouton)
    gameContent.innerHTML = `
        <div class="text-overlay">
            <h2>Jeu des poumons et du coeur</h2>
            <p>Trouve et répare les coraux brisés, représentant les poumons et le cœur de l'océan.</p>
        </div>
        <img src="assets/img/corail/fond1.gif" alt="Fond" width="100%" height="100%" />
    `;

    // Appliquer un border-radius uniquement à l'image
    const image = gameContent.querySelector('img');
    image.style.borderRadius = '15px';

    // Configuration du mini-jeu
    const numDivs = 12;
    const numIntruders = 4;
    const intruderIndices = [];
    const coralImages = ["assets/img/corail/corail1.png", "assets/img/corail/corail2.png", "assets/img/corail/corail3.png", "assets/img/corail/corail4.png"];
    const intruderImages = ["assets/img/corail/Bcorail1.png", "assets/img/corail/Bcorail2.png", "assets/img/corail/Bcorail3.png", "assets/img/corail/Bcorail4.png"];
    const placedPositions = []; // Stocke les positions déjà placées
    const minDistance = 150; // Distance minimale entre les coraux
    let repairedIntruders = 0; // Compteur des intrus réparés

    // Sélectionner aléatoirement les indices des intrus
    while (intruderIndices.length < numIntruders) {
        const randomIndex = Math.floor(Math.random() * numDivs);
        if (!intruderIndices.includes(randomIndex)) {
            intruderIndices.push(randomIndex);
        }
    }

    function generateRandomPosition() {
        let positionValid = false;
        let x, y;

        while (!positionValid) {
            const centerX = window.innerWidth / 4;
            const centerY = window.innerHeight / 4;
            const range = 200;

            x = centerX + (Math.random() * range * 5.5 - 2 * range);
            y = centerY + (Math.random() * range * 1.8 -1 * range);

            positionValid = placedPositions.every(pos => {
                const distance = Math.sqrt(Math.pow(pos.x - x, 2) + Math.pow(pos.y - y, 2));
                return distance >= minDistance;
            });
        }

        placedPositions.push({ x, y });
        return { x, y };
    }

    function createDiv(x, y, isIntruder, index) {
        const newDiv = document.createElement('div');
        newDiv.style.position = 'absolute';
        newDiv.style.left = `${x}px`;
        newDiv.style.top = `${y}px`;

        const img = document.createElement('img');
        const scale = 0.7 + Math.random() * 0.6; // Échelle entre 70 % et 130 %

        img.style.width = `${200 * scale}px`; // Taille basée sur l'échelle
        img.style.height = `${200 * scale}px`;
        img.style.objectFit = 'contain';
        img.style.position = 'absolute';
        img.style.opacity = '100%'; // Opacité fixée à 100 %

        if (isIntruder) {
            // Assigner une image spécifique pour les intrus
            img.src = intruderImages[index];
        } else {
            // Assigner une image aléatoire pour les coraux non-intrus
            img.src = coralImages[Math.floor(Math.random() * coralImages.length)];
            img.style.transform = `rotate(${Math.random() * 360}deg)`; // Rotation aléatoire
        }

        newDiv.appendChild(img);
        newDiv.style.cursor = 'pointer';

        newDiv.addEventListener('click', () => {
            if (isIntruder) {
                // Identifier le numéro du corail à partir de l'image actuelle
                const intruderNumber = index + 1; // Les indices correspondent à BcorailX
                img.src = `assets/img/corail/corail${intruderNumber}.png`; // Remplacer par corailX
                img.style.filter = 'grayscale(0%)'; // Réinitialiser tout effet visuel
                alert(`Corail intrus n°${intruderNumber} réparé !`);

                // Incrémenter le compteur des intrus réparés
                repairedIntruders++;
                
                // Vérifier si tous les intrus ont été réparés
                if (repairedIntruders === numIntruders) {
                    win();
                }
            } else {
                alert('Ceci est un corail sain.');
            }
        });

        gameContent.appendChild(newDiv);
    }

    // Générer les divs
    for (let i = 0; i < numDivs; i++) {
        const { x, y } = generateRandomPosition();
        const isIntruder = intruderIndices.includes(i);
        createDiv(x, y, isIntruder, isIntruder ? intruderIndices.indexOf(i) : null);
    }

    // Ajout des requins comme décor
    function addSharkDecoration() {
        const sharkImages = ['assets/img/corail/requin1.png', 'assets/img/corail/requin2.png'];
        const randomHeight = Math.random() * window.innerHeight; // Hauteur aléatoire

        sharkImages.forEach(sharkSrc => {
            const sharkImg = document.createElement('img');
            sharkImg.src = sharkSrc;
            sharkImg.style.position = 'absolute';
            sharkImg.style.left = '100%'; // Commence à droite
            sharkImg.style.top = `${randomHeight}px`; // Hauteur aléatoire
            sharkImg.style.width = '600px'; // Taille des requins
            sharkImg.style.height = 'auto'; // Conserver le ratio d'aspect
            sharkImg.style.opacity = '0'; // Initialement invisible
            sharkImg.style.pointerEvents = 'none'; // Ne pas interagir avec les requins

            // Ajout de l'animation CSS pour déplacer le requin de droite à gauche, avec fade in et fade out
            sharkImg.style.animation = 'sharkMove 8s linear infinite, sharkFade 16s ease-in-out infinite, sharkAnimation 2s infinite alternate'; 

            gameContent.appendChild(sharkImg);
        });
    }

    // Appeler la fonction pour ajouter les requins
    addSharkDecoration();

    // Ajouter les styles CSS pour l'animation des requins
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes sharkMove {
            0% {
                left: 100%; /* Commence à droite */
                opacity: 0;
            }
            40% {
                opacity: 0.3; /* Fade in jusqu'à 60% d'opacité */
            }
            60% {
                left: 50%; /* Arrêt temporaire au centre */
                opacity: 0.4;
            }
            80% {
                opacity: 0.4;
            }
            100% {
                left: -300px; /* Va jusqu'à complètement à gauche */
                opacity: 0; /* Fade out */
            }
        }

        @keyframes sharkAnimation {
            0% {
                content: url('assets/img/corail/requin1.png');
            }
            100% {
                content: url('assets/img/corail/requin2.png');
            }
        }

        /* CSS pour centrer le texte et le rendre beau */
        .text-overlay {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            font-family: 'Arial', sans-serif;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .text-overlay h2 {
            margin: 0;
            font-size: 30px;
            font-weight: bold;
        }

        .text-overlay p {
            margin: 10px 0;
            font-size: 20px;
        }
    `;
    document.head.appendChild(style);

    // Simulate a database update for the user
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
    
    

    function win(){
        const gameContent = document.getElementById('game-content');
        gameContent.style.backgroundImage = ''; // Remove the background
        gameContent.innerHTML = '<h1 style="text-align: center">Vous avez gagné 800 points! 🎉</h1>';
    
        // Update the user's game_points in the database
        updateUserPoints(800); // Call the function to add 100 points
        bodyParts.lung= true;
        const organImage = document.querySelector(`.organ[data-part="lung"]`);
        if (organImage) {
            organImage.src = `assets/img/lung-healed.png`; 
        }
    }

})();
