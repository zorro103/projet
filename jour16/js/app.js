// J'appelle mon JSON depuis une URL 
function getRandomCocktail() {
    fetch("https://www.thecocktaildb.com/api/json/v1/1/random.php")
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        // Pour se positionner sur l'objet drinks de data à l'indice 0
        console.log(data.drinks[0]);
        // afficher les infos dans le HTML
        // on affiche la valeur des propriétés du cocktail dans un template HTML à l'intérieur de l'élément qu'on a sélectionné
        cocktailInfo.innerHTML = `
        <div>
        <h2>Nom du cocktail : ${data.drinks[0].strDrink}</h2>
        <p class="id">Id du cocktail : ${data.drinks[0].idDrink}</p>
        <p class="cat">Catégorie : ${data.drinks[0].strCategory}</p>
        <p class="ins">Instructions : ${data.drinks[0].strInstructions}</p>    
        <img src="${data.drinks[0].strDrinkThumb}" class="img-thumb">
        </div>`;
    });

      };

// On va chercher l'ID du bouton
const btn = document.getElementById("bouton-ajax");
// on récupère l'ID de la DIV dans la page index.php où va s'afficher le résultat
const cocktailInfo = document.getElementById("cocktail-info");

btn.addEventListener("click", function() {
    // au clic on invoque la fonction getRandomCocktail()
    getRandomCocktail();
})
  










// // On ajoute un écouteur au bouton et on appelle la fonction lorsque l'on clique
// btn.addEventListener("click", getRandomCocktail);



// const user = getRandomCocktail();
  
// // on affiche la valeur des propriétés du user dans un template HTML à l'intérieur de l'élément qu'on a sélectionné
// userInfo.innerHTML = `
// <div>
// <p>Id de l'utilisateur : ${user.id}</p>
// <h1>Nom du cocktail : ${user.name}</h1>
//   <p>Email de l'utilisateur : ${user.email}</p>
//   <p>Username de l'utilisateur : ${user.username}</p>
// </div>`;
// });




// // déclaration d'une fonction qui génère un entier aléatoire compris entre 0 et la longueur du tableau users et retourne un utilisateur choisi au hasard dans le tableau
// function getRandomUser() {
//     const randomIndex = Math.floor(Math.random() * users.length);
  
//     const user = users[randomIndex];
  
//     return user;
//   }
  



//   // on récupère la référence aux éléments du DOM dont on a besoin
//   const userBtn = document.getElementById("userBtn");
//   const userInfo = document.getElementById("userInfo");
  
//   // on ajoute un écouteur d'événement au click sur le bouton
//   userBtn.addEventListener("click", function() {
//     // quand on clique, on invoque la fonction getRandomUser() et on stocke l'utilisateur retourné dans une variable user
//     // user contient maintenant un objet
//     const user = getRandomUser();
  
//     // on affiche la valeur des propriétés du user dans un template HTML à l'intérieur de l'élément qu'on a sélectionné
//     userInfo.innerHTML = `
//     <div>
//       <h1>Nom de l'utilisateur : ${user.name}</h1>
//       <p>Id de l'utilisateur : ${user.id}</p>
//       <p>Email de l'utilisateur : ${user.email}</p>
//       <p>Username de l'utilisateur : ${user.username}</p>
//     </div>`;
//   });










// // AJAX call using XMLHttpRequest
// function makeRequest() {
//   // Steps
//   // Instanciate object XMLHttpRequest
//   const xml = new XMLHttpRequest();
//   // open request
//   xml.open("get", "https://api.le-systeme-solaire.net/rest/bodies/");
//   // Check for onload event (status)
//   xml.onload = function() {
//     if (xml.status == 200) {
//       console.log(JSON.parse(xml.responseText));
//     }
//   };
//   // Send request
//   xml.send();
// }



// Fetch API
// AJAX call using XMLHttpRequest
// function makeFetchRequest() {
//   fetch("lib/process.php")
//     .then(function(response) {
//       return response.json();
//     })
//     .then(function(data) {
//       console.log(data);
//     })
//     .catch(function(error) {
//       console.log(error);
//     });
// }



// AJAX example with API call
// function getRandomCocktail() {
//   fetch("https://www.thecocktaildb.com/api/json/v1/1/random.php")
//     .then(function(response) {
//       return response.json();
//     })
//     .then(function(data) {
//       console.log(data);
//     });
// }