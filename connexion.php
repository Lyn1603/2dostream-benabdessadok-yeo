<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
<h1> Bonjour </h1>
<img src="./images/Logo_de_la_SPA__France_-removebg-preview.png" width="50px">
<h3> Connectez-vous </h3>
<form method="post">
    <label> Email </label>
    <br>
    <br>
    <input type="text" name="email"/>
    <br>
    <br>
    <label> Mot de passe </label>
    <br>
    <br>
    <input type="password" name="password"/>
    <input type="hidden" name="admin"/>
    <br>
    <br>
    <input type="submit" value="OK" name="verify"/>
</form>
</body>
</html>
<?php
session_start();
if ($_POST) {
    require 'class/connect.php';
    $connection = new connect();
    $user = $_POST['email'];
    $password = $_POST['password'];
    $result = $connection->connexion($user, $password);
    var_dump($result);
    if ($result['user'] === 1 and $result['password']) {
        $_SESSION['id'] = $result['id'];
        header('Location: admin.php');
    } else {
        $_SESSION['id'] = $result['id'];
        header('Location: my-account.php');
    }
    $_SESSION['user'] = $result;
    echo 'veuillez remplir les champs';
}