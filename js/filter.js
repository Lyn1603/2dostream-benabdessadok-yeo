function genre() {
    axios.get("https://api.themoviedb.org/3/genre/movie/list?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US")
        .then(response => {
        let results = response.data["genres"]
        let results_genre = document.querySelector(".results_genre")
        results.forEach((data) => {
            results_genre.insertAdjacentHTML('beforeend', "<button onclick='results_genre()'>"+ data.name +"</button>")
        })
    })
}

function results_genre(){
    axios.get('https://api.themoviedb.org/3/discover/movie?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&with_genres='
        + this.value + '&api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US')
        .then(response => {
            let genre = response.data["genre_ids"]
            let list_genre = document.querySelector(".list_genres")
                console.log(genre)

        })
}
