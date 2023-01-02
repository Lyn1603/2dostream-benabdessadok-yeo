//import genre from "filter.js"
const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

let showresults = document.querySelector('#showResults');
let search = document.querySelector("#search")
let aresults = document.querySelector('#showResults');
let results = []

search.addEventListener("keyup", (e) => {
    let h1s =  aresults.getElementsByTagName("h1");
    //console.log(h1s)
    let val = search.value.toUpperCase();
    for (let i = 0; i < h1s.length; i++) {
        let a  = h1s[i].textContent || h1s[i].innerText;
        //console.log(a)
        if (a.toUpperCase().indexOf(val) > -1) {
            h1s[i].style.display = "";
        } else {
            h1s[i].style.display = "none";
        }
    }
});

axios.get(url).then(response => {

    results = response.data["results"]
    //console.log(response.data["results"])

    results.forEach((data) => {
        let a = document.createElement("h1");
        a.innerHTML = data.title
        console.log(data.genre_ids)
        for (let i = 0; i < data.genre_ids.length; i++) {
            a.classList.add(data.genre_ids[i])
        }
        showresults.appendChild(a)
    })
})

function genre() {
    axios.get("https://api.themoviedb.org/3/genre/movie/list?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US")
        .then(response => {
            let results = response.data["genres"]
            //console.log(results)
            let results_genre = document.querySelector(".results_genre")

            results.forEach((data) => {
                //console.log(data)
                //results_genre.insertAdjacentHTML('beforeend', "<button onclick='results_genre()'>"+ data.name +"</button>")
                let a = document.createElement("button");
                a.innerHTML = data.name
                a.id = data.id
                results_genre.appendChild(a);
                a.addEventListener("click",()=>{
          //          console.log(a.id)
                    let res = showresults.getElementsByTagName("h1");
                    for (let i = 0; i < res.length; i++) {
                        let b  = res[i]
            //            console.log(b)
                        if (b.classList.contains(a.id)) {
                            res[i].style.display = "";
                        } else {
                            res[i].style.display = "none";
                        }
                    }
                })


            })
        })
}

function avis() {
    axios.get(url)
        .then(response => {
            let results = response.data["results"]
            //console.log(results)
            let results_avis = document.querySelector(".results_avis")

            results.forEach((data) => {
                //console.log(data)
                //results_genre.insertAdjacentHTML('beforeend', "<button onclick='results_genre()'>"+ data.name +"</button>")
                let a = document.createElement("button");
                a.innerHTML = data.vote_average
                a.id = data.title
                results_avis.appendChild(a);
                a.addEventListener("click",()=>{
                              //console.log(a.id)
                    let res = showresults.getElementsByTagName("h1");
                    for (let i = 0; i < res.length; i++) {
                        let b  = res[i]
                        //            console.log(b)
                        if (b.classList.contains(a.id)) {
                            res[i].style.display = "";
                        } else {
                            res[i].style.display = "none";
                        }
                    }
                })


            })
        })
}