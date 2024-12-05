<?php

try{
    if (session_status() == PHP_SESSION_NONE) session_start();    
    $bdd = new PDO('mysql:host=localhost;dbname=oceanhospital;charset=utf8;','root','');
}catch(Exception $e){
    die('Erreur survenue :' . $e->getMessage());
}
