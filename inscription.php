<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h1> Bonjour </h1>
<img src="./images/Logo_de_la_SPA__France_-removebg-preview.png" width="50px">
<h3> Inscrivez-vous </h3>
<br>
<form method="post">
    <label> Prenom </label>
    <br>
    <br>
    <input type="text" name="firstname"/>
    <br>
    <br>
    <label> Nom </label>
    <br>
    <br>
    <input type="text" name="lastname"/>
    <br>
    <br>
    <label> Email </label>
    <br>
    <br>
    <input type="text" name="email"/>
    <br>
    <br>
    <label> Mot de Passe </label>
    <br>
    <br>
    <input type="password" name="password"/>
    <br>
    <br>
    <label> Confirmez votre mot de passe </label>
    <br>
    <br>
    <input type="password" name="password1"/>
    <br>
    <br>
    <input  class="button" type="submit" value="OK" />
    <?php
    echo '<a href="connexion.php">Déja inscrit, connectez-vous </a>';
    ?>
</form>
</body>
</html>

<?php
session_start();
require './user.php';
require './connect.php';
if ($_POST) {
    $user = new user(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['email'],
        $_POST['password'],
        $_POST['password1']
    );


    if ($user->verify()) {
        $connection = new connect();
        $result = $connection->insert($user);


        if ($result) {
            echo 'Register with success!';
            header('Location:my-account.php');
        } else {
            echo 'Internal error snif';
        }
    } else {
        echo "Form has an error";
    }

}


?>
