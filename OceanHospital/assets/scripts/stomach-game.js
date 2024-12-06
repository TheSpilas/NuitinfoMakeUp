(function () {
    const gameContent = document.getElementById('game-content');
    
    // Function for the typewriter effect
    function typeWriterEffect(element, text, speed = 20) {
        let index = 0;
        function type() {
            if (index < text.length) {
                element.innerHTML += text.charAt(index);
                index++;
                setTimeout(type, speed);
            }
        }
        type();
    }

    gameContent.style.backgroundColor = 'aquamarine';

    // Add the game content
    gameContent.innerHTML = `
        <h2 style="margin: 20px 20px; padding: 5px 0; color: #333;">Bienvenue au jeu de la Pollution Marine</h2>
        <p id="task-text" style="margin: 20px 0; padding: 10px; font-size: 18px; color: #555; background-color: #fff;"></p>
        <button id="change-bg-btn" style="
            margin: 30px 40px;
            width: 200px;
            height: 50px;
            background-image:none;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        ">
           Commencer le jeu
        </button>
    `;

    const taskText = document.getElementById('task-text');
    const textContent = "L'océan, c'est un peu comme notre estomac : quand il est sain, tout fonctionne bien. Mais imaginez qu'on y jette des déchets, comme des plastiques et des produits chimiques : l'océan commence à \"digérer\" tout ça, mais il n'arrive plus à traiter la pollution. Résultat, tout s'accumule et ça perturbe son équilibre, tout comme un estomac qui aurait trop de mauvais aliments. Pour éviter que nos océans ne se retrouvent \"malades\", il faut réduire nos déchets et préserver leur \"santé\". Gardons nos océans propres, c'est aussi prendre soin de notre propre bien-être ! 🌊🐠";

    // Apply typewriter effect to the text
    typeWriterEffect(taskText, textContent);

    // Button click event listener
    const changeBgBtn = document.getElementById('change-bg-btn');
    changeBgBtn.addEventListener('click', () => {
        // Change background to water.jpg
        gameContent.style.backgroundImage = "url('assets/img/stomach_files/water.gif')";
        gameContent.style.backgroundSize = "cover";
        gameContent.style.backgroundPosition = "center";
        
        // Clear the content of gameContent
        gameContent.innerHTML = '';

        // Add a message for the drag and drop game
        gameContent.innerHTML = `
            <div id="game-area" style="position: relative; width: 100%; height: 100%;">
                <img id="plastic-bottle" src="assets/img/stomach_files/juice.png" style="position: absolute; left: 50px; top: 50px; width: 45px; cursor: pointer;" draggable="true">
                <img id="can" src="assets/img/stomach_files/can.png" style="position: absolute; left: 150px; top: 100px; width: 60px; cursor: pointer;" draggable="true">
                <img id="plastic-bag" src="assets/img/stomach_files/can2.png" style="position: absolute; left: 250px; top: 150px; width: 60px; cursor: pointer;" draggable="true">
                <div id="bin" style="position: absolute; right: 20px; bottom: 50px;width: 80px; height: 80px; text-align: center; line-height: 80px; color: white; font-size: 20px; cursor: pointer;">
                    <img width="90px" src="assets/img/stomach_files/bin.png">
                </div>
            </div>
        `;

        // Ensure draggable items are set up correctly
        const draggables = document.querySelectorAll('img[draggable="true"]');
        draggables.forEach(item => {
            item.addEventListener('dragstart', (event) => {
                console.log(`Dragging ${event.target.id}`);
                event.dataTransfer.setData('text', event.target.id); // Store the ID of the dragged item
            });
        });

        // Get the bin element and attach event listeners
        const bin = document.getElementById('bin');
        console.log(bin); // Ensure the bin element is selected

        let remainingTrash = draggables.length; // Count of total trash items at the start

        // Enable drop functionality
        bin.addEventListener('dragover', (event) => {
            event.preventDefault(); // Allow dropping
            console.log('Dragover event triggered'); // Debug message
        });

        bin.addEventListener('drop', (event) => {
            event.preventDefault(); // Prevent default browser behavior
            console.log('Drop event triggered'); // Debug message

            const draggedItemId = event.dataTransfer.getData('text');
            const draggedItem = document.getElementById(draggedItemId);

            if (draggedItem) {
                console.log(`Dropped ${draggedItemId} into the bin`);
                draggedItem.style.opacity = '0'; // Fade out
                setTimeout(() => {
                    draggedItem.remove(); // Remove item from DOM
                }, 500);

                // Decrement the remaining trash count
                remainingTrash -= 1;
                console.log(`Remaining trash: ${remainingTrash}`);

                // Check if all trash is removed
                if (remainingTrash === 0) {
                    win(); // Call the win function when all trash is removed
                }
            } else {
                console.log('Error: Dragged item not found!');
            }
        });
        
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
            gameContent.innerHTML = '<h1 style="text-align: center; margin-top: 100px;">Vous avez gagné 100 points! 🎉</h1>';
        
            // Update the user's game_points in the database
            updateUserPoints(100); // Call the function to add 100 points
            bodyParts.stomach= true;
            const organImage = document.querySelector(`.organ[data-part="stomach"]`);
            if (organImage) {
                organImage.src = `assets/img/stomach-healed.png`; 
            }
        }

    });
})();
