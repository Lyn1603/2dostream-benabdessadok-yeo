<!DOCTYPE html>
<html>
<head>
    <title>Recherche</title>
</head>
<body>

<form method="post">
    <label>Search</label>
    <input type="text" name="search">
    <input type="submit" name="submit">

</form>

</body>
</html>
<script>
    import axios from './node_modules/axios'
    const url = "https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1";

    axios.get(url)

</script>