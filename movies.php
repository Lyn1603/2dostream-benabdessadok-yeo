<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Films à l'affiche</title>
</head>
<body>
<div>
    <h1> Films à l'affiche </h1>

    <?php
    require './tab_bar.php';
    ?>

    <ul id="movies"></ul>

    <script>
        function create(element) {
            return document.createElement(element);
        }

        function append(parent, el) {
            return parent.appendChild(el);
        }

        const ul = document.getElementById('movies');
        const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=fr&page=1';

        fetch(url)
            .then((resp) => resp.json())
            .then(function (data) {
                let movie = data["results"];
                return movie.map(function (movie) {
                    let span = create('span');
                    let h1 = create('h1');
                    let p = create('p');
                    let img = create('img');
                    let div = create('button');
                    let br = create('br');
                    h1.innerHTML = `${movie.title}`;
                    p.innerHTML = `${movie.release_date}`;
                    span.innerHTML = `${movie.overview}`;
                    img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + `${movie.poster_path}`;
                    div.innerHTML = '<a href="./single.php?id='+data.id+'">' + "Consulter le film" + "</a>"
                    append(ul, h1);
                    append(ul, img);
                    append(ul, p);
                    append(ul, span);
                    append(ul, br);
                    append(ul, div);


                })

            })
            .catch(function (error) {
                console.log(error);
            });

    </script>
</div>
</body>
</html>
