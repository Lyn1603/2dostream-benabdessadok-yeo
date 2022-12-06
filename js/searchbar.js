const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

axios.get(url).then(response => {
    let search = document.querySelector("#search")
    let showresults = document.querySelector('#showResults');
    let results = response.data["results"]
    showresults.innerHTML = "results : " + results
    search.addEventListener("keyup", (e) => {
        let searchLetter = e.target.value;
        SearchResults(searchLetter, showresults);

        function SearchResults(char, element) {
            if (char.length > 2) {
                for (let i = 0; i < element; i++) {
                    if (element.textContent.toLowerCase().includes(char)) {
                            showresults.innerHTML = element[i]
                    } else {
                            showresults.innerHTML = "nous avons trouvé aucun résultat"

                    }
                }
            }

        }
    });


})