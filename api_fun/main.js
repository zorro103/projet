// URL de l'API
const baseUrl ="https://swapi.co/api/"; // attention ceci est juste une chaine de caracteres et pas encore une "vraie" url

// On recupère et on stocke les 2 éléments qui nous intéressent du document dans 2 variables
const randBtn = document.querySelector("#randomButton");
const resultsDiv =document.querySelector("#results");

randBtn.addEventListener("click", function() {
    // Au choix 
    // Version JS classique
    // fetch (baseurl+"species/")
    // Version avec les `
    fetch(`${baseUrl}species/`)
    .then(function(resultat) {
        return resultat.json();
    })
    .then(function(data) {
        // propriétés : name, language, classification, average_lifespan, eye_colors   
        console.log(data);

        // Le format est du type : data.results[3].name
        // Là on va chercher dans data, le nom dans results puis l'index [0] donc : Hutt 
        //const name = data.results[0].name;
        //console.log(name); // Hutt
        // Mais ça ne nous intéresse pas on veut un name aléatoire donc un index alétoire

        // ON VEUT UN INDEX ALEATOIRE
        // étape1 on compte la longueur du tableau des résultats
        const resultsLength = data.results.length;

        console.log(resultsLength); // 10

        // étape 2 : on génère un index aléatoire
        // Math.random c'est pour un nombre aléatoire
        // Math.floor c'est pour arrondir vers le bas
        const randomIndex = Math.floor(Math.random() * resultsLength);

        console.log(randomIndex); // on obtient 3 ou 4 , ... ou n'importe quel nombre donc ça marche

        // On détermine nos variables avec le randomIndex aléatoire généré 
        const name = data.results[randomIndex].name;
        const language = data.results[randomIndex].language;
        const classification = data.results[randomIndex].classification;
        const lifespan = data.results[randomIndex].average_lifespan;

        //On renvoit les résultats dans la console et ça marche
        console.log(`Nom de la race : ${name}`);
        console.log(`Langage : ${language}`);
        console.log(`Classification : ${classification}`);
        console.log(`Durée de vie moyenne : ${lifespan}`);

        // On envoit les éléments dans index.html
        document.getElementById("nom").innerHTML=name;
        document.getElementById("langue").innerHTML=language;
        document.getElementById("classe").innerHTML=classification;
        document.getElementById("duree").innerHTML=lifespan;     
    });
});

