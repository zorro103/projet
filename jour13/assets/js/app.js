

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
    console.log ("Trop petit");
}

// les boucles
for  (let i=1; i < 10; i++) {
    console.log ("on est à l'itération", i)
}