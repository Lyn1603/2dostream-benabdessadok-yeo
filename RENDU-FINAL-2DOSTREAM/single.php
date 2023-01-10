<html>
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
    <title></title>
</head>

<body class="flex-col bg-[#1C232B] text-white ">
<div id="movies"></div>
<br>
<button class="rounded-lg bg-blue-500 px-4 py-2" > <a href="recherche.php">Retour </a> </button>
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
            let div = document.createElement('div');
            h1.innerHTML = "<h2>"+ data.title + "</h2>"
            h3.innerHTML = "<h2>"+ "Résumer :" + "</h2>" + data.overview;
            p.innerHTML = " Date de réalisation : "+ data.release_date;
            img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + data.poster_path ;
            div.innerHTML = "<h1>"+ data.title + "</h1>" + `<img src="https://www.themoviedb.org/t/p/w300_and_h450_bestv2/${data.poster_path}"/>` + "<h2>"+ " Synopsis :" + "</h2>" + data.overview +  "<h2>"+ " Date de réalisation : " + data.release_date + "</h2>"
            ul.appendChild(div);





        })
        .catch(function (error) {
            console.log(error);
        });

</script>
</html>