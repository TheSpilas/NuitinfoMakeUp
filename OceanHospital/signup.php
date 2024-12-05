
<?php require('actions/auth/signupAction.php');?>
<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="main">

    <form method="POST">
        <?php if (isset($errorMsg)){echo '<p>'.$errorMsg.'</p>';}?>

        <div>
            <label>username : </label>
            <input type="text" name="username">
        </div>
        <div>
            <label>password : </label>
            <input type="password"  name="password">
        </div>
        <button type="submit" name="signup">sign up</button>
    </form>
    <a href="login.php"><p>You already have an account ?</p></a>
</div>
</body>
</html>