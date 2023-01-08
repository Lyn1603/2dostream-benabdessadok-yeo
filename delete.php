<?php

if(isset($_GET['id'])){
    require_once 'add_film.php';

    $connection = new add();
    $connection->delete($_GET['id']);

    // redirect to users.php url
    header('Location: index.php');
}
