
        // STEP 1 : OBTENIR SON ADRESSE IP
        fetch("https://api.ipify.org?format=json")
          // version javascript classique
          .then(function(response) {
            return response.json();
          })
          // version ES6 (fonctions fléchées)
          // si on a qu'un seul paramètre à passer à la fonction on peut se passer des parenthèses. Elles seront obligatoires s'il y en a plusieurs
          // si la fonction n'exécute qu'une seule instruction, on peut aussi se passer des {}. Sinon elles seront obligatoires
          // dans le code à la ligne suivante le return est implicite, on n'a pas besoinde le spécifier
          // .then(response => response.json())
  
          .then(function(data) {
            const ip = data.ip;

            // Pour afficher l'IP
                console.log(data);

  
            // STEP 2 : RECUPERER UN NOM DE VILLE EN FONCTION DE L'ADRESSE IP OBTENUE
            // méthode 1 : utilisation des backticks string litterals
            // fetch(
            //   `http://api.ipstack.com/${ip}?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914`
            // );
  
            // méthode 2 : méthode classique avec concaténation de chaînes de caractères
            // On appelle :
            // l'API ipstack + on y ajoute notre IP obtenue + On utilise l'access Key de Lionel généreusement fournie ;)
            fetch(
              "http://api.ipstack.com/" + ip + "?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914"
            )
              .then(function(response) {
                return response.json();
              })
              .then(function(data) {
                let city = data.city; // ici on va récupérer Marseille 01 qu'on doit transformer juste en marseille
                    console.log(city) // Marseille 01

                // On ne doit conserver que le nom de la ville avec split on ne prend que l'index[0]
                // qui correspond au premier mot Marseille
                // On doit passerla chaine de caractères en minusculees
                city = city.split(" ")[0].toLowerCase();
                    console.log(city); // marseille

            fetch(`http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=8e602b9ea28ed4f9f8fc97a5f6d1105c&lang=fr&units=metric`)
                .then(function(response) {
                    //on transforme la réponse en objet Javascript
                    return response.json(); 
                  })
                .then(function(data) {
                    //on récupère un objet JS, on peut maintenant accéder à ses propriétés
                    // debug
                    console.log(data);  

                // Ici je récupère les éléments du DOM dans lesquels je veux afficher la valeur des infos météo que je récupère
                const city = document.querySelector("h1");
                const temp = document.querySelector("p");
                const conditions = document.querySelector("i");

                // Ensuite j'injecte cette valeur dans le DOM
                // par ex : je vais chercher la valeur de la propiété temp de la propriété main de l'objet data
                const ville = data.name;
                // Math.round c'est pour arrondir la température obtenue
                const temperature = Math.round(data.main.temp);
                const icon = data.weather[0].id;

                    console.log("La ville est ", ville);
                    console.log("La température est ", temperature);
                    console.log("l'ID est", icon);

                // propriétés possibles affichage icone : description, id, ison, main
                // Ceci est dans le tableau en console : objet/weather/0 (faut déplier)
                // On peut maintenant afficher les informations dans les éléments du DOM qui nous intéressent
                // city.innerText = city.innerText + ville;
                // On peut aussi l'écrire de manière raccourcie
                city.innerText += ville;
                temp.innerText += temperature + "°";

                    console.log(conditions.classList); // Pour afficher le wi

                const conditionsClass = "wi-owm-" + icon; // Va afficher wi-own-500

                    console.log(conditionsClass);

                // Ce qui fait donc que l'on affiche bien dans i (voir dans html) wi wi-own500
                conditions.classList.add(conditionsClass);
                });
            });
        });
  
        
