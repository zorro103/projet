

// declaration de variable et affectation de valeur
let day;

day= "jour 13";

console.log (day);

// on peut réaffecter une valeur à une variable
day= "jour 14";

console.log (day);

// declaration de constante
const organisme = "Simplon";

console.log (organisme);

// Va provoque une erreur car in ne peut réaffecter une valeur à une constante
//organisme = "Afpa";


// conditions
let taille = 121;

if (taille >= 190) {
    console.log("Trop grand");
} else if (taille >= 120) {
    console.log("Amuse Toi");
} else {
    console.log("Trop petit");
}


// les boucles

// for
for  (let i=1; i < 10; i++) {
    console.log("on est à l'itération", i)
}

// for each (pour chaque valeur dans un tableau)
let tableau = [1, 2, 3, 4, 5];

tableau.forEach(function(element) {
    console.log(element);
});

// while
let i = 0;
while (i < 10) {
    console.log("on est à l'itération de la boucle while", i);
    i++;
}

// Le DOM en JS
const p = document.getElementsByTagName("p");
console.log(p);

//-------------------------------------------------------

// div .box (avec espace) va aller chercher les elements de class box dan une div
// div.box (sans espace) va aller chercher les div qui ont une classe box
// div box ce sont 2 classes

const boxes = document.querySelectorAll ("div.box p");

// AVEC FOR

// for (let i = 0; i < boxes.length; i++) {
//     boxes[i].style.fontSize = "1.5rem";
//     boxes[i].style.color = "red";
// };

//AVEC FOR EACH

boxes.forEach(function(elem) {
    elem.style.fontSize = "1.6rem";
    elem.style.color = "blue";
});


// pour changer le premier élément p et lui seul

boxes[0].style.color = "green";

