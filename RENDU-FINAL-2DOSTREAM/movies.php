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
    <title>Films à l'affiche</title>
</head>
<header> 
    <div class="flex flex-row gap-x-middlesmall	">
    <img class="rounded-xl  w-middlesmall" src="images/logo 2doStream.png" alt="" srcset="">
    <?php
        require './tab_bar.php';
    ?>

    </div>href="album.php"


</header>
<body class="w-11/12 mx-auto bg-[#1C232B] text-[#e5e7eb]">
<br> 
<h1> Les Tendances </h1>
    <div class="grid lg:grid-cols-6 gap-4 grid-cols-2 mt-8" id="movies"></div>
    <script>
        function create(element) {
            return document.createElement(element);
        }

        function append(parent, el) {
            return parent.appendChild(el);
        }

        const ul = document.getElementById('movies');
        const url = 'https://api.themoviedb.org/3/trending/all/day?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=fr';

        fetch(url)
            .then((resp) => resp.json())
            .then(function (data) {
                let movie = data["results"];
                return movie.map(function (movie) {
                    let div = create('div');
                    div.innerHTML = `<img src="https://www.themoviedb.org/t/p/w300_and_h450_bestv2/${movie.poster_path}" />` + "<br>" + `${movie.title}`+ "<br>" + " Date de parution : " + `${movie.release_date}`+ "<br>" + '<a class="rounded-lg bg-blue-500 px-4 py-2" href="./single.php?id='+data.id+'">'  + "Consulter le film" + "</a>" 
                    append(ul, div);

                })

            })
            .catch(function (error) {
                console.log(error);
            });

    </script>
</div>
<br>
<br>
<button class="rounded-lg bg-blue-500 px-4 py-2" > <a href="delete.php">Deconnexion </a> </button>
</body>
</html>