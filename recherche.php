<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recherche</title>
</head>
<body>

<form method="post">
    <label>Search</label>
    <input type="text" id="search" name="search">
</form>
<ul>
    <button class="genre" onclick="genre()"> Genre </button>
    <div class="results_genre"></div>
    <button class="avis" onclick="avis()"> Avis </button>
    <div id="results_avis"></div>
    <button class="nom" onclick=""> Nom </button>
    <button class="popular" onclick=""> Popularité </button>
    <button class="vue" onclick=""> Vues </button>
    <button class="age" onclick=""> Classifications d'âges </button>

</ul>
    <div id="showResults"></div>


</body>
</html>
<script src="./node_modules/axios/dist/axios.min.js"></script>
<script src="js/searchbar.js"> </script>
<script src="js/filter.js"> </script>