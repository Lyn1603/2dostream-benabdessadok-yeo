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
    <button> Genre </button>
    <button> Avis </button>
    <button> Nom </button>
    <button> Popularité </button>
    <button> Vues </button>
    <button> Classifications d'âges </button>
</ul>
<div id="showResults"></div>
<div id="resultmovies"></div>
</body>
</html>
<script src="./node_modules/axios/dist/axios.min.js"></script>
<script src="js/searchbar.js"> </script>