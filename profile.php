
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

require_once 'headear_footer/header.php';
if(!isset($_SESSION['user'])) {
    header('location:./inscription.php');
}
if(!isset($_GET['id'])){
    header('location:./profile.php?id='.$_SESSION['id']);
}

if($_POST && isset($_POST['preferences'])){
    $_SESSION['user']->updateStuff([
        'informations'=>$_POST['informations']
    ]);
    header('location:./profile.php?id='.$_SESSION['id']);
}

require_once 'class/album.php';
$albums = Album::all($_GET['id']);
$user = User::GET ($_GET['id']);
$stuff = $user->getItems();
?>

    <main >
        <div >
            <h1 ><?=($user->firstname)?></h1>

            <div >
                <h3><?=htmlspecialchars($user->lastname)." ".htmlspecialchars($user->last_name)?></h3>
                <p><?=isset($stuff['informations'])?htmlspecialchars($stuff['informations']):''?></p>
            </div>

            <div >
                <h2 >Albums</h2>
                <div >
                    <div >
                        <?php foreach ($albums as $album):
                            if($album->is_public || $_SESSION['user']->isContributor($album->getItems())):?>
                                <a  href="album.php?id=<?=($album->id)?>">

                                        <div >
                                            <h3 ><?=($album->name)?></h3>
                                            <ul>
                                                <li>Vues : <?=($album->views)?></li>
                                                <li>Likes : <?=($album->likes)?></li>
                                            </ul>

                                        </div>
                                    </section>
                                </a>
                            <?php  endif; endforeach; ?>
                    </div>
                </div>
            </div>
            <div>
                <h2 >Likes</h2>

                <div >

                    <div >
                        <?php $albums = Album::getLiked($_SESSION['user']->getID());
                        foreach ($albums as $album):
                            if($album->is_public || $_SESSION['user']->isContributor($album->getStuff())):?>
                                <a  href="album.php?id=<?=($album->id)?>">
                                    <section >
                                        <div >
                                            <h3 ><?=($album->name)?></h3>
                                            <ul >
                                                <li>Vues : <?=($album->views)?></li>
                                                <li>Likes : <?=($album->likes)?></li>
                                            </ul>

                                        </div>
                                    </section>
                                </a>
                            <?php  endif; endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php
require_once './headear_footer/footer.php';
?>