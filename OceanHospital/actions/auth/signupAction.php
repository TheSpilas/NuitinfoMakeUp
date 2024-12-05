
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require('actions/database.php');

if (isset($_POST['signup'])){

    if (!empty($_POST['username']) AND !empty($_POST['password'])){
        
        $username_input = htmlspecialchars($_POST['username']);
        $password_input = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT username FROM users WHERE username = ?');
        $checkIfUserAlreadyExists->execute(array($username_input));

        if ($checkIfUserAlreadyExists->rowCount() == 0){
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(username,password)VALUES(?,?)');
            $insertUserOnWebsite->execute(array($username_input,$password_input));

        $getIdOfUserReq = $bdd->prepare('SELECT * FROM users where username = ?');
        $getIdOfUserReq->execute(array($username_input));

        $userInfo = $getIdOfUserReq->fetch();

        $_SESSION['auth'] = true;
        $_SESSION['id'] = $userInfo['id'];
        $_SESSION['username'] = $userInfo['username'];

        header('Location: index.php');

        }else {
            $errorMsg="User already exists !";
        }

    }else {
        $errorMsg="Please complete all fields !";
    }
}