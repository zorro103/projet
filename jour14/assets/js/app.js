// Fonctions
// je crée la fonction
function sayHello() {
 return "Hellooooo";
}

//j'invoque la fonction
sayHello();

//-----------------------------------------------

//je crée la fonction avec le paramètre name
function greet(name) {
    let message = sayHello();
    console.log("Hellooo " + name);
}
// je passe la valeur Brian au paramètre name
greet("Brian");

//-----------------------------------------------

// on stocke une fonction dans une variable
// ici c'est le code de la fonction qui est stocké et pas la valeur qu'elle retourne
const addNumbers = function(nb1, nb2) {
    return nb1 + nb2;
};

// dans la variable result on stocke le résultat retourné par la fonction addNumbers()
const result = addNumbers(10 + 50);

console.log(result);