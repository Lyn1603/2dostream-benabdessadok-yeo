

function results_genre(){
    axios.get('https://api.themoviedb.org/3/discover/movie?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&with_genres='
        + this.value + '&api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US')
        .then(response => {
            let genre = response.data["genre_ids"]
            let list_genre = document.querySelector(".list_genres")
                console.log(genre)

        })
}
