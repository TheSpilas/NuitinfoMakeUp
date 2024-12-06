<?php require('actions/updateGamePoints.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Art Health Game</title>
    <link rel="stylesheet" href="assets/styles/game.css">
</head>
<body>
    <div id="game-container">
        <img id="character" src="assets/img/corps.png" alt="Character" width="550px" height="550px">
        <img id="lung" title="Lung" class="organ" src="assets/img/lung-sick.png" data-part="lung" style="top: 54%; left: 37%; width: 25%; height: 15%;">
        <img id="brain" title="Brain" class="organ" src="assets/img/brain-sick.png" data-part="brain" style="top: 10%; left: 32%; height: 22%;">
        <img id="fever" title="Fever" class="organ" src="assets/img/fever-sick.png" data-part="fever" style="top: 38%; left: 50%; height: 15%;">
        <img id="stomach" title="Stomach" class="organ" src="assets/img/stomach-sick.png" data-part="stomach" style="top: 65%; left: 40%; height: 10%;">
    
    </div>
    
    <!-- Dynamic game interface -->
    <div id="game-interface" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); color:white; z-index:1000;">
        <div id="game-content" style="margin:auto; position:relative; top:10%; width:70%; height:70%; background:white; color:black;"></div>
        <button id="close-game" style="position:absolute; top:5%; right:5%; z-index:2000;">Close</button>
    </div>

    <script src="assets/scripts/game.js"></script>
</body>

</html>

