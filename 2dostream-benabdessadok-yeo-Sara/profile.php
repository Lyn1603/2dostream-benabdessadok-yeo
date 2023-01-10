<?php

session_start();

$Id = $_GET['idUs'];
require_once "class/connect.php";
require_once "class/album.php";
require_once "class/user.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<?php
require_once 'header.php';
?>

<div >

    <div >

        <?php

        $connect = new connect();
        $users = $connect->get($Id);

        echo $users->firstName . ' ' . $users->lastName;
        ?>

    </div>

    <div >
        <?php

        $co = new connect();
        $get = $co->getAlbums($Id);

        foreach ($get as $gets) {
            if ($gets['visibility'] === 'public') { ?>
                <div >
                    <?= $gets['name']; ?>
                </div>
            <?php }


        } ?>
    </div>
</div>


</body>
</html>