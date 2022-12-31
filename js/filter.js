import axios from "axios";

function genre() {
    fetch("https://api.themoviedb.org/3/genre/movie/list?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375")
        .then((resp) => resp.json())
        .then(function (data) {
            let genres = data["genres"];
            let results = document.querySelector(".results")
            genres.forEach((data) => {
                results.insertAdjacentHTML('beforeend', "<button onclick='results_genre()'>" + data['name'] + "</button>")

            })
        })
        .catch(function (error) {
            console.log(error);
        });
}

function results_genre(){
    axios.get("").then(response => {

    })
}
