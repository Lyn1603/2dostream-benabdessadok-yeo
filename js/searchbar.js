//import genre from "filter.js"
const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&page=1';

let showresults = document.querySelector('#showResults');
let search = document.querySelector("#search")
let aresults = document.querySelector('#showResults');
let results = []

search.addEventListener("keyup", (e) => {
    let h1s = aresults.getElementsByTagName("h1");
    //console.log(h1s)
    let val = search.value.toUpperCase();
    for (let i = 0; i < h1s.length; i++) {
        let a = h1s[i].textContent || h1s[i].innerText;
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
        let a = document.createElement("a");
        let c = document.createElement("p");

        a.innerHTML = '<a href="./single.php?id='+results['id']+'">' + data.title + "</a>"
        c.innerHTML = data.popularity
        for (let i = 0; i < data.genre_ids.length; i++) {
            a.classList.add(data.genre_ids[i])

        }

        for (let x = 0; x < data.popularity; x++) {
            c.classList.add(data.popularity)
        }

        showresults.appendChild(a)
        showresults.appendChild(c)



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
                console.log(a.innerHTML)
                a.addEventListener("click", () => {
                    //  console.log(a.id)
                    let res = showresults.getElementsByTagName("h1");
                    for (let i = 0; i < res.length; i++) {
                        let b = res[i]
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

function popular() {

    axios.get("https://api.themoviedb.org/3/discover/movie?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=en-US&sort_by=popularity.desc")
        .then(response => {
            let results = response.data["results"]
            let results_avis = document.querySelector("#results_popular")
            results.forEach((data) => {
                let b = document.createElement("button");
                b.innerHTML = data.popularity
                b.id = data.popularity
                results_avis.appendChild(b);
                b.addEventListener("click", () => {
                    let res = showresults.getElementsByTagName("p");


                    for (let x = 0; x < res.length; x++) {
                            let b = res[x]

                        if (b.classList.contains(data.popularity)){
                            b.style.display = ""
                        }else{
                            b.style.display = "none"
                        }

                    }


                })


            })
        })

}