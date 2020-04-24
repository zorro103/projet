// console.log("Ca marche");

var url = 'http://newsapi.org/v2/top-headlines?' +
          'country=us&' +
          'apiKey=de4f56ccc1e94ad0854e6aba789282e9';
var req = new Request(url);
fetch(req)
    .then(function(response) {
        console.log(response.json());
    })


// On recupère et on stocke les 3 éléments qui nous intéressent du document dans 3 variables
const searchInput = document.querySelector("#search");
const Btn = document.querySelector("#bouton-envoyer");
const resultsDiv =document.querySelector("#resultats-news");

Btn.addEventListener("click", function() {

    // Version JS classique
    // fetch (url)
    // Version avec les `
    fetch(`${url}`)
    .then(function(resultat) {
        return resultat.json();
    })
    .then(function(data) {
        // propriétés : title, description, author  
        console.log(data);

        // Le format est du type : data.articles[0].title
        // Là on va chercher dans data, le title dans articles puis l'index [0] puis dans [1] pour l'auteur
        // const title = data.articles[0].title;
        // console.log(title);
        // const description = data.articles[0].description;
        // console.log(description); 
        // const author= data.articles[1].author;
        // console.log(author); 
        // const image= data.articles[1].urlToImage;
        // console.log(image); 

        // On détermine nos variables
        const title = data.articles[0].title;
        const description = data.articles[0].description;
        const author = data.articles[1].author;
        const image = data.articles[1].urlToImage;

        //On renvoie les résultats dans la console et ça marche !
        console.log(`Le Titre : ${title}`);
        console.log(`La Description : ${description}`);
        console.log(`L'Auteur : ${author}`);
        console.log(`L'Image : ${image}`);

        
        // On envoie les éléments dans index.php

        // $image = $tabAsso["image"];
        // $image = image;

        // var imageString = String(image);

        document.getElementById("titre").innerHTML=title;
        document.getElementById("description").innerHTML=description;
        document.getElementById("auteur").innerHTML=author; 
        document.getElementById("img").src=image;   

        // IL MANQUE LA BOUCLE POUR CREER CHAQUE NEWS
        
    });
});
