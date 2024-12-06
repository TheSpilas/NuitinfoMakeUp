document.addEventListener('DOMContentLoaded', function () {
    const boardElement = document.getElementById('morpion');
    const message = document.getElementById('message');
    const loginForm = document.getElementById('login-form');
    const captchaError = document.getElementById('captcha-error');
    const captchaSolvedInput = document.getElementById('captcha_solved');

    let board = ['', '', '', '', '', '', '', '', ''];
    let currentPlayer = 'X'; // Le joueur X commence

    function checkWinner() {
        const winPatterns = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Lignes
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Colonnes
            [0, 4, 8], [2, 4, 6]             // Diagonales
        ];

        for (let pattern of winPatterns) {
            const [a, b, c] = pattern;
            if (board[a] && board[a] === board[b] && board[a] === board[c]) {
                return board[a]; // Le gagnant est X ou O
            }
        }
        return null;
    }

    function handleClick(cellIndex) {
        if (board[cellIndex] !== '') return;

        board[cellIndex] = currentPlayer;
        document.querySelector(`[data-cell="${cellIndex}"]`).textContent = currentPlayer;

        const winner = checkWinner();
        if (winner) {
            if (winner === 'X') {
                message.textContent = `Le joueur ${winner} a gagné !`;
                document.getElementById('captcha_solved').value = 'true'; // CAPTCHA résolu
                loginForm.classList.remove('hidden'); // Affiche le formulaire
                document.getElementById('game-board').classList.add('hidden'); // Masque le jeu
            } else {
                message.textContent = `Le joueur ${winner} a gagné !`;
                setTimeout(resetGame, 2000);
            }
        } else if (board.indexOf('') === -1) {
            message.textContent = 'Match nul !';
            setTimeout(resetGame, 2000);
        } else {
            currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
            message.textContent = `C'est au tour de ${currentPlayer} !`;
            if (currentPlayer === 'O') {
                aiMove(); // L'IA joue
            }
        }
    }

    function resetGame() {
        board = ['', '', '', '', '', '', '', '', ''];
        currentPlayer = 'X';
        message.textContent = `C'est au tour de ${currentPlayer} !`;
        document.getElementById('game-board').classList.remove('hidden');
        loginForm.classList.add('hidden');

        const cells = document.querySelectorAll('#morpion td');
        cells.forEach(cell => {
            cell.textContent = '';
        });

        captchaSolvedInput.value = 'false';
    }

    function aiMove() {
        const availableCells = [];
        for (let i = 0; i < board.length; i++) {
            if (board[i] === '') {
                availableCells.push(i);
            }
        }

        const randomCell = availableCells[Math.floor(Math.random() * availableCells.length)];
        setTimeout(() => {
            handleClick(randomCell);
        }, 500);
    }

    const cells = document.querySelectorAll('#morpion td');
    cells.forEach(cell => {
        cell.addEventListener('click', (e) => {
            const cellIndex = e.target.getAttribute('data-cell');
            if (currentPlayer === 'X') {
                handleClick(cellIndex);
            }
        });
    });
});

