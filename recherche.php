<!DOCTYPE html>
<html>
<head>
    <title>Recherche</title>
</head>
<body>

<form method="post">
    <label>Search</label>
    <input type="text" id="search" name="search">
</form>
<ul>
    <button class="genre" onclick="genre()"> Genre </button>
    <div class="results"></div>
    <div class="results1"></div>
    <button class="avis" onclick=""> Avis </button>
    <button class="nom" onclick=""> Nom </button>
    <button class="popular" onclick=""> Popularité </button>
    <button class="vue" onclick=""> Vues </button>
    <button class="age" onclick=""> Classifications d'âges </button>

</ul>
    <div id="showResults"></div>
    <div id="resultmovies"></div>


</body>
</html>
<script src="./node_modules/axios/dist/axios.min.js"></script>
<script src="js/searchbar.js"> </script>
<script src="js/filter.js"> </script>