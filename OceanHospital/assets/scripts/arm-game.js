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

    // Add the game content
    gameContent.innerHTML = `
        <h2 style="margin: 20px 20px; padding: 5px 0; color: #333;">Bienvenue au jeu de la Pollution Marine</h2>
        <p id="task-text" style="margin: 20px 0; padding: 10px; font-size: 18px; color: #555; background-color: #fff;"></p>
        <button id="change-bg-btn" style="
            margin: 30px 40px;
            width: 200px;
            height: 50px;
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
        gameContent.style.backgroundImage = "url('stomach_files/water.jpg')";
        gameContent.style.backgroundSize = "cover";
        gameContent.style.backgroundPosition = "center";
        
        // Clear the content of gameContent
        gameContent.innerHTML = '';

        // Add a message for the drag and drop game
        gameContent.innerHTML = `
            <h2 style="text-align: center; color: #333;">Glissez les déchets dans la poubelle</h2>
            <div id="game-area" style="position: relative; width: 100%; height: 400px; >
                <img id="plastic-bottle" src="stomach_files/plastic_bottle.png" style="position: absolute; left: 50px; top: 50px; width: 60px; cursor: pointer;" draggable="true">
                <img id="can" src="stomach_files/can.png" style="position: absolute; left: 150px; top: 100px; width: 60px; cursor: pointer;" draggable="true">
                <img id="plastic-bag" src="stomach_files/plastic_bag.png" style="position: absolute; left: 250px; top: 150px; width: 60px; cursor: pointer;" draggable="true">
                <div id="bin" style="position: absolute; right: 20px; bottom: 20px; width: 80px; height: 80px; text-align: center; line-height: 80px; color: white; font-size: 20px; cursor: pointer;">
                    <img width="40px" src="stomach_files/bin.png">
                </div>
            </div>
        `;

        // Drag and drop functionality
        const draggables = document.querySelectorAll('img[draggable="true"]');
        const bin = document.getElementById('bin');
        
        draggables.forEach(item => {
            item.addEventListener('dragstart', (event) => {
                event.dataTransfer.setData('text', event.target.id);
            });
        });

        bin.addEventListener('dragover', (event) => {
            event.preventDefault();
        });

        bin.addEventListener('drop', (event) => {
            event.preventDefault();
            const draggedItemId = event.dataTransfer.getData('text');
            const draggedItem = document.getElementById(draggedItemId);
            const binRect = bin.getBoundingClientRect();
            const itemRect = draggedItem.getBoundingClientRect();
            
            // Check if the item is inside the bin area
            if (
                itemRect.right > binRect.left && 
                itemRect.left < binRect.right && 
                itemRect.bottom > binRect.top && 
                itemRect.top < binRect.bottom
            ) {
                draggedItem.style.left = `${binRect.left + (binRect.width - itemRect.width) / 2}px`;
                draggedItem.style.top = `${binRect.top + (binRect.height - itemRect.height) / 2}px`;
                draggedItem.setAttribute('draggable', 'false'); // Prevent further dragging
                draggedItem.style.cursor = 'default';
                bin.innerHTML = '✅'; // Indicate success by changing bin content
                bin.style.backgroundColor = 'green';
            }
        });
    });
})();
