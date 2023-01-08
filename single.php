<html>
<head>
    <title></title>
</head>

<body>
<div id="movies"></div>

</body>

<script>
    let ul = document.querySelector("#movies");
    let url = 'https://api.themoviedb.org/3/movie/<?=$_GET['id']?>&?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=fr';
    console.log(url)
    fetch(url)
        .then((resp) => resp.json())
        .then(function (data) {

            let h1 = document.createElement('h1');
            let h3 = document.createElement('h3');
            let p = document.createElement('p');
            let img = document.createElement('img');
            h1.innerHTML = data.title;
            h3.innerHTML = "<h2>"+ "Résumer :" + "</h2>" + data.overview;
            p.innerHTML = " Date de réalisation : "+ data.release_date;
            img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + data.poster_path ;
            ul.appendChild(h1);
            ul.appendChild(img);
            ul.appendChild(h3);
            ul.appendChild(p);





        })
        .catch(function (error) {
            console.log(error);
        });

</script>
</html>
