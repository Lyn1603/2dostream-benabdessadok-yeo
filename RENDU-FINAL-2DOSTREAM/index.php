<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./style.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <link href="src/input.css" rel="stylesheet">
    <link href="../src/input.css" rel="stylesheet">
    <link href="./build/css/style.css" rel="stylesheet">
    <link href="../build/css/style.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body class="flex-col text-center bg-[#1C232B] ">
<img class="relative left-long0 pt-medium " width="10%" src="images/logo%202doStream.png" alt="logo 2doStream" >
<div class="grid lg:grid-cols-1 gap-4 grid-cols-1 mt-8 " >
<form method="post">
    <h3 class="text-4xl text-white"> Connectez-vous </h3>
    <br>
    <label class="text-white"> Email </label>
    <br>
    <input type="text" name="email"/>
    <br>
    <label class="text-white"> Mot de passe </label>
    <br>
    <input type="password" name="password"/>
    <br>
    <br>
    <input class="rounded-lg bg-blue-500 px-4 py-2" type="submit" value="OK" name="verify"/>
    <br>
    <br>
    <?php
    echo '<a class="text-white" href="inscription.php">Jamais inscrit, inscrivez-vous </a>';
    ?>
</form>

</div>
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
    if ($result['exist'] === 0) {
        $_SESSION['id'] = $result['id'];
        header('Location: movies.php');
    } else {
        header('Location: connexion.php');
    }
    $_SESSION['firstname'] = $result['firstname'];
    echo 'veuillez remplir les champs';
}