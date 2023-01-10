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
    <title>Login</title>
</head>
<body class="text-center bg-[#1C232B] " >
<img class="relative left-long0 w-middlesmall" src="images/logo%202doStream.png" alt="logo 2doStream" >

<div class="grid lg:grid-cols-1 gap-4 grid-cols-1 mt-8 text-white" >
<h3 class="text-4xl mb-10"> Inscrivez-vous </h3>
<br>
<form method="post">
    <label> Nom : </label>
    <input type="text" name="lastname"/>
    <br>
    <br>
    <label> Prenom : </label>
    <input type="text" name="firstname"/>
    <br>
    <br>
    <label> Email : </label>
    <input type="text" name="email"/>
    <br>
    <br>
    <label> Mot de Passe : </label>
    <input type="password" name="password"/>
    <br>
    <br>
    <label> Confirmez votre mot de passe : </label>
    <input type="password" name="password1"/>
    <br>
    <br>
    <input class="rounded-lg bg-blue-500 px-4 py-2" class="button" type="submit" value="OK" />
    <br>
    <?php
    echo '<a class="text-blue-500" href="index.php">Déja inscrit, connectez-vous </a>';
    ?>
</form>

</div>

</body>
</html>

<?php
session_start();
require 'class/user.php';
require 'class/connect.php';
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
            header('Location:connexion.php');
        } else {
            echo 'Internal error snif';
        }
    } else {
        echo "Form has an error";
    }

}


?>
