
const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

axios.get(url).then(response => {
    let showresults = document.querySelector('#showResults');
    let results = response.data["results"]
    let search = document.querySelector("#search")
    results.forEach((data) => {
        showresults.insertAdjacentHTML('beforeend', "<h1>"+ data.title +"</h1>")
    })

    search.addEventListener("keyup", (e) => {
        let aresults = document.querySelector('#showResults');

        axios.get('https://api.themoviedb.org/3/search/movie?query='
            + this.value + '&api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US')
            .then(response => {
                aresults.innerHTML = "Films : " + response.data['total_results'];
                if(response.data['total_results'] === 10000) {
                    aresults.innerHTML += '+'
                }
                response.data['results'].forEach(result => {
                    if(document.querySelectorAll('#resultmovies ').length < 2){
                        aresults.appendChild( document.createElement('li'));
                        document.querySelector('#resultmovies').insertAdjacentHTML('beforebegin', "<a>"+ result['title'] +"</a>");

                    }
                })
            })
            .catch(error => console.error(error));
    });


})

