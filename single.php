<html>
<head>
    <title></title>
</head>

<ul id="movie"></ul>

<script>
    function create(element) {
        return document.createElement(element);
    }

    function append(parent, el) {
        return parent.appendChild(el);
    }

    const ul = document.getElementById('movie');
    const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

    fetch(url)
        .then((resp) => resp.json())
        .then(function (data) {
            if ()
            let movie = data["results"];
            return movie.map(function (movie) {
                let span = create('span');
                let h1 = create('h1');
                let p = create('p');
                let img = create('img');
                h1.innerHTML = `${movie.title}`;
                p.innerHTML = `${movie.release_date}`;
                span.innerHTML = `${movie.overview}`;
                img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + `${movie.poster_path}`;
                append(ul, h1);
                append(ul, img);
                append(ul, p);
                append(ul, span);


            })

        })
        .catch(function (error) {
            console.log(error);
        });

</script>
<body>


</body>

</html>