//import genre from "filter.js"
const url = 'https://api.themoviedb.org/3/movie/popular?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=fr&page=1';

let showresults = document.querySelector('#showResults');
let search = document.querySelector("#search")
let results = []

// CE QUI EST AFFICHE AU TOUT DEBUT DE LA PAGE
axios.get(url).then(response => {

    results = response.data["results"]
    results.forEach((data) => {
        let a = document.createElement("h1");
        let b = document.createElement("p");
        let c = document.createElement("div");
        let img = document.createElement('img');
        a.innerHTML =  data.title
        b.innerHTML =  data.popularity
        c.innerHTML = '<a href="./single.php?id='+data.id+'">' + "Consulter le film" + "</a>"
        img.src = "https://www.themoviedb.org/t/p/w300_and_h450_bestv2/" + data.poster_path;
        for (let i = 0; i < data.genre_ids.length; i++) {
            a.classList.add(data.genre_ids[i])
        }
        for (let i = 0; i < data.genre_ids.length; i++) {
            img.classList.add(data.genre_ids[i])
        }
        for (let x = 0; x < data.popularity; x++) {
            b.classList.add(data.popularity)
        }
        for (let x = 0; x < data.popularity; x++) {
            c.classList.add(data.popularity)
        }
        for (let x = 0; x < data.popularity; x++) {
            img.classList.add(data.popularity)
        }
        showresults.appendChild(a)
        showresults.appendChild(img)
        showresults.appendChild(b)
        showresults.appendChild(c)
    })
})


// BARRE DE RECHERCHE

search.addEventListener("keyup", (e) => {
    let h1s = showresults.getElementsByTagName("h1");
    let val = search.value.toUpperCase();
    for (let i = 0; i < h1s.length; i++) {
        let a = h1s[i].textContent || h1s[i].innerText;
        if (a.toUpperCase().indexOf(val) > -1) {
            h1s[i].style.display = "";
        } else {
            h1s[i].style.display = "none";
        }
    }
});


// FONCTION POUR TRIER LES GENRES

function genre() {
    axios.get("https://api.themoviedb.org/3/genre/movie/list?api_key=f0fb6f1cd0d5b87fa09e82b0392cf375&language=fr")
        .then(response => {
            let results = response.data["genres"]
            let results_genre = document.querySelector(".results_genre")
            results.forEach((data) => {
                let a = document.createElement("button");
                a.innerHTML = data.name
                a.id = data.id
                results_genre.appendChild(a);
                a.addEventListener("click", () => {
                    let res = showresults.getElementsByTagName("h1");
                    let res1 = showresults.getElementsByTagName("p");
                    let res2 = showresults.getElementsByTagName("a");
                    let res3 = showresults.getElementsByTagName("img");

                    for (let i = 0; i < res.length; i++) {
                        let b = res[i]
                        let b1 = res1[i]
                        let b2 = res2[i]
                        let b3 = res3[i]

                        b1.style.opacity = "0";
                        b2.style.opacity = "0";
                        b3.style.opacity = "0";

                        if (b.classList.contains(a.id)) {
                            b.style.display = ""
                            b1.style.opacity = "1";
                            b2.style.opacity = "1";
                            b3.style.opacity = "1";
                        } else {
                            b.style.display = "none"
                        }
                    }
                })
            })
        })
}


// FONCTION POUR TRIER LA POPULARITE DES FILMS

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
                    let res1 = showresults.getElementsByTagName("h1");
                    let res2 = showresults.getElementsByTagName("a");
                    let res3 = showresults.getElementsByTagName("img");
                    for (let x = 0; x < res.length; x++) {
                        let b = res[x]
                        let b1 = res1[x]
                        let b2 = res2[x]
                        let b3 = res3[x]

                        b1.style.opacity = "0.5";
                        b2.style.opacity = "0.5";
                        b3.style.opacity = "0.5";

                        if (b.classList.contains(data.popularity)) {
                            b.style.display = ""
                            b1.style.opacity = "1";
                            b2.style.opacity = "1";
                            b3.style.opacity = "1";


                        } else {
                            b.style.display = "none"
                        }

                    }


                })


            })
        })

}