<?php

require('actions/database.php');

if (isset($_POST['login'])){

    if (!empty($_POST['username']) AND !empty($_POST['password'])){
        
        $username_input = htmlspecialchars($_POST['username']);
        $password_input = htmlspecialchars($_POST['password']);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT * FROM users WHERE username = ?');
        $checkIfUserAlreadyExists->execute(array($username_input));

        if ($checkIfUserAlreadyExists->rowCount() > 0){
            $userInfo = $checkIfUserAlreadyExists->fetch();
            if (password_verify($password_input,$userInfo['password'])){
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['username'] = $userInfo['username'];


                header('Location: index.php');
            }else {
            $errorMsg="Wrong password :(";
        }

        }else {
            $errorMsg="User doesn't exist !";
        }

    }else {
        $errorMsg="Please complete all fields !";
    }
}