
const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

axios.get(url).then(response => {
    let showresults = document.querySelector('#showResults');
    let results = response.data["results"]
    let search = document.querySelector("#search")
    results.forEach((data) => {
        showresults.insertAdjacentHTML('beforeend', "<h1>"+ data.title +"</h1>")
    })

    search.addEventListener("keyup", (e) => {
        console.log(e)
        function create(element) {
            return document.createElement(element);
        }

        function append(parent, el) {
            return parent.appendChild(el);
        }
        axios.get('https://api.themoviedb.org/3/movie/?query=?'
            + this.value + '?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375')
            .then(response => {
                search.innerHTML = response.data['total_results'];
                if(response.data['total_results'] === 10000) {
                    search.innerHTML += '+'
                }
                response.data['results'].forEach(results => {
                    if(document.querySelectorAll('ul.resultMovie li').length < 5){
                        list.appendChild(document.createElement('li'));
                        document.querySelector('ul.resultMovie li:last-child').innerHTML =
                            '<a href="./movie.php?id='+results['id']+'">'+results['title']+'</a>';
                    }
                })
            })
            .catch(error => console.error(error));
    });

})

