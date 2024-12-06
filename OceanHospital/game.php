
<?php
include('includes/head.php');
require('actions/updateGamePoints.php'); 
require('actions/auth/securityAction.php'); 
?>
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
        <img id="character" src="assets/img/corps.png" alt="Character">
        <img id="head" class="organ" src="head-sick.png" data-part="head" style="top: 10%; left: 40%; width: 25%; height: 15%;">
        <img id="arm" class="organ" src="arm-sick.png" data-part="arm" style="top: 30%; left: 20%; width: 50%; height: 10%;">
    </div>
    
    <!-- Dynamic game interface -->
    <div id="game-interface" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); color:white; z-index:1000;">
        <div id="game-content" style="margin:auto; position:relative; width:80%; height:80%; background:white; color:black;"></div>
        <button id="close-game" style="position:absolute; top:5%; right:5%; z-index:2000;">Close</button>
    </div>

    <script src="assets/scripts/game.js"></script>
</body>

</html>
