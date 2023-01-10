<!DOCTYPE html>
<html>
<head lang="en">
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
    <title>Recherche</title>
</head>
<body class="bg-[#1C232B] text-white ">

<div>
<form class="flex flex-row gap-x-40" method="post">
    <label class=" pl-middlesmall text-2xl">Rechercher par nom : </label>
    <input class="rounded-lg px-10 py-2" type="text" id="search" name="search">
    <button class="rounded-lg bg-blue-500 px-4 py-2" > <a href="movies.php">Retour </a> </button>

</form>
<br>
<br>
<br>
<ul class=" pl-extrasmall flex flex-wrap gap-x-40">
    <h3><strong>Filtres de recherche :</strong> </h3>
    <button class="rounded-lg bg-blue-500 px-4 py-2 gap-x-40" class="genre" onclick="genre()"> Genre </button>
    <div class="results_genre"> </div>
    <button class="rounded-lg bg-blue-500 px-4 py-2" class="popular" onclick="popular()"> Popularité </button>
    <div id="results_popular"></div>
    <button class="rounded-lg bg-blue-500 px-4 py-2" class="age" onclick=""> Classifications d'âges </button>
    <div id="results_adults"></div>

</ul>
    


</div>

<div class="grid lg:grid-cols-6 gap-4 grid-cols-2 mt-8 " id="showResults"></div>


</body>
</html>
<script src="./node_modules/axios/dist/axios.min.js"></script>
<script src="js/searchbar.js"> </script>
