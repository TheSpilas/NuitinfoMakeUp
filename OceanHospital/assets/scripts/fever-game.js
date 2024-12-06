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

    gameContent.style.backgroundColor = '#FF6347'; // Fever related background color

    // Add the game content
    gameContent.innerHTML = `
        <h2 style="margin: 20px 20px; padding: 5px 0; color: #fff;">Bienvenue au jeu de la Fièvre</h2>
        <p id="task-text" style="margin: 20px 0; padding: 10px; font-size: 18px; color: #fff; background-color: #FF6347;"></p>
        <button id="start-game-btn" style="
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
    const textContent = "Quand votre température monte, comme lorsque vous avez de la fièvre, votre corps est en danger. Si la température des océans augmente, c'est tout un écosystème qui est menacé. Réparez la banquise pour protéger la planète !";

    // Apply typewriter effect to the text
    typeWriterEffect(taskText, textContent);

    // Button click event listener
    const startGameBtn = document.getElementById('start-game-btn');
    startGameBtn.addEventListener('click', () => {
        // Change background to ice puzzle
        gameContent.style.backgroundImage = "url('assets/img/fever_background.jpg')";
        gameContent.style.backgroundSize = "cover";
        gameContent.style.backgroundPosition = "center";

        // Clear the content of gameContent and add puzzle
        gameContent.innerHTML = '';
        loadPuzzle();
    });

    function loadPuzzle() {
        const puzzleSize = 3;
        const tiles = [];
        for (let i = 0; i < puzzleSize * puzzleSize; i++) {
            tiles.push(i);
        }
        shuffleArray(tiles);

        // Create puzzle grid
        const puzzleGrid = document.createElement('div');
        puzzleGrid.className = 'puzzle-grid';
        puzzleGrid.style.display = 'grid';
        puzzleGrid.style.gridTemplateColumns = `repeat(${puzzleSize}, 1fr)`;
        puzzleGrid.style.gap = '0';
        puzzleGrid.style.width = '100%';
        puzzleGrid.style.height = 'calc(100vh - 100px)';

        tiles.forEach((tile, index) => {
            const tileElement = document.createElement('div');
            tileElement.className = 'puzzle-tile';
            tileElement.textContent = tile === 0 ? '' : tile; 
            tileElement.dataset.index = index;
            tileElement.style.width = '100%';
            tileElement.style.height = '100%';
            tileElement.style.border = '1px solid #000';
            tileElement.style.display = 'flex';
            tileElement.style.alignItems = 'center';
            tileElement.style.justifyContent = 'center';
            tileElement.style.backgroundColor = tile === 0 ? '#fff' : '#ADD8E6'; 

            if (tile !== 0) {
                tileElement.style.backgroundImage = `url('assets/img/banquise_${tile}.jpg')`;
                tileElement.style.backgroundSize = '100% 100%';
            }

            tileElement.addEventListener('click', () => handleTileClick(tileElement, tiles, puzzleGrid));
            puzzleGrid.appendChild(tileElement);
        });

        gameContent.appendChild(puzzleGrid);
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    function handleTileClick(tileElement, tiles, puzzleGrid) {
        const emptyIndex = tiles.indexOf(0);
        const clickedIndex = parseInt(tileElement.dataset.index);

        const isAdjacent =
            Math.abs(emptyIndex - clickedIndex) === 1 && Math.floor(emptyIndex / 3) === Math.floor(clickedIndex / 3) ||
            Math.abs(emptyIndex - clickedIndex) === 3;

        if (isAdjacent) {
            [tiles[emptyIndex], tiles[clickedIndex]] = [tiles[clickedIndex], tiles[emptyIndex]];
            updatePuzzleGrid(puzzleGrid, tiles);
        }
    }

    function updatePuzzleGrid(puzzleGrid, tiles) {
        puzzleGrid.childNodes.forEach((tileElement, index) => {
            const tile = tiles[index];
            tileElement.textContent = tile === 0 ? '' : tile;
            tileElement.style.backgroundColor = tile === 0 ? '#fff' : '#ADD8E6';

            if (tile !== 0) {
                tileElement.style.backgroundImage = `url('assets/img/banquise_${tile}.jpg')`;
                tileElement.style.backgroundSize = '100% 100%';
            } else {
                tileElement.style.backgroundImage = 'none';
            }
        });

        if (isPuzzleSolved(tiles)) {
            onMiniGameSuccess();
        }
    }

    function isPuzzleSolved(tiles) {
        for (let i = 0; i < tiles.length - 1; i++) {
            if (tiles[i] !== i + 1) {
                return false;
            }
        }
        return tiles[tiles.length - 1] === 0;
    }

    function onMiniGameSuccess() {
        const gameContent = document.getElementById('game-content');
        gameContent.style.backgroundImage = ''; // Remove the background
        gameContent.innerHTML = '<h1 style="text-align: center; color: #fff;">Vous avez gagné 1200 points! 🎉</h1>';
        // Update points or other game logic
        updateUserPoints(1200);
        bodyParts.fever= true;
        const organImage = document.querySelector(`.organ[data-part="fever"]`);
        if (organImage) {
            organImage.src = `assets/img/fever-healed.png`; 
        }
    }

    function updateUserPoints(points) {
        fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `points=${points}`
        })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }
})();
