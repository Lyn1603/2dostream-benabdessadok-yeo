
<?php

require 'headear_footer/header.php';

if($_GET && isset($_GET['id'])){

    require_once 'class/album.php';
    $album = Album::GET($_GET['id']);
    if($album){
        $stuff = $album->getItems();

        if($_POST && isset($_POST['liked'])){
            $album->toggleLike($_SESSION['user']->getID());
            header('location:./album.php?id='.$album->id);
        }

        if($_POST && isset($_POST['delete_album'])){
            if($_SESSION['user']->isContributor($stuff)){
                Album::deleteAll($_GET['id']);
                header('location:./profile.php');
            }
        }

        if(sizeof($stuff['movie']) === 0){
            header('location:./profile.php');
        }
        if($album->isprivate ){
            $album->addView();
            $album->views++;

            ?>
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
            <div >

                <h1 ><?=($album->name)?></h1>

                <form method="post" >
                    <input type="hidden" name="delete_album">
                    <button type="submit">Supprimer l'album</button>
                </form>
                <h2 ><?php
                    foreach ($stuff['contributor'] as $contributor){
                        ?>
                        <a  href="profile.php?id=<?=($contributor['id'])?>">
                            <?=($contributor['firstname'])?>
                        </a>
                        <?php
                    }?></h2>

                <h2>Informations :</h2>
                <div >
                    <ul  >
                        <li>Noms : <?=($album->name)?></li>
                        <li>Vues : <?=($album->views)?></li>
                        <li>Likes : <?=($album->likes)?></li>
                    </ul>
                </div>

                <?php if($album->isprivate):?>
                    <form action="./album.php?id=<?=($album->id)?>" method="post">
                        <input name="liked" value="<?=$_SESSION['user']->Liked($album->id)?1:0?>">
                        <button >
                            <?=$_SESSION['user']->Liked($album->id)?'Supprimer likes':'Liker'?>
                        </button>
                    </form>

                <?php endif;?>
                <div >
                    <h2>participer :</h2>
                    <form  action="./invitation/index.php" method="post">
                        <input type="hidden" name="album" value="<?=($_GET['id'])?>">
                        <button class=" hover:underline underline-offset-4" type="submit">lien</button>
                    </form>
                </div>
            </div>
            <?php
        }else{
            ?>

            <main>
                <h1>Cet album est privé</h1>
                <p><i>Sa consultation est réservée aux contributeurs</i></p>
                <a href="./profile.php?id=<?=htmlspecialchars($stuff['contributor'][0]['id'])?>">Retour</a>
            </main>

            <?php
        }
    }
}else{
    header('location:./album.php');
}require_once './headear_footer/footer.php';
            ?>
            </body>
            </html>


