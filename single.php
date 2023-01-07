<html>
<head>
    <title></title>
</head>

<body>
<ul class="movies"></ul>



</body>
<script>
    function create(element) {
        return document.createElement(element);
    }

    function append(parent, el) {
        return parent.appendChild(el);
    }

    let ul = document.getElementsByClassName('movies');
    let url = 'https://api.themoviedb.org/3/movie/<?=$_GET['id']?>&?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375';
    console.log(url);

    axios.post(url)
        .then((resp) => resp.json())
        .then(function (data) {

            let movies = data['results'];
            console.log(movies)
            return movies.map(function () {
                let span = create('span');
                let h1 = create('h1');
                let p = create('p');
                let img = create('img');
                h1.innerHTML = `${data.title}`;
                p.innerHTML = `${data.release_date}`;
                span.innerHTML = `${data.overview}`;
                img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + `${data.poster_path}`;
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
</html>