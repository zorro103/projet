// Fonctions
// je crée la fonction
function sayHello() {
 return "Hellooooo ";
}

//j'invoque la fonction
sayHello();

//-----------------------------------------------

//je crée la fonction avec le paramètre name
function greet(name = "John") {
    let message = sayHello();
    console.log(message + name);
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
const result = addNumbers(10, 50);

console.log(result);

//-----------------------------------------------

//syntaxe ES6
// function count(max) {
//     for (let index = 0; index < max.length; index++) {
//         console.log("Itération n° " + max);
//     }
// }

// syntaxe fonctions fléchées ES6
const count = (nb1, nb2 = 10) => console.log(nb1 + nb2);

count(20, 50)

//-----------------------------------------------

//Les objets en JS
const tableau = [];

const user = {};

console.log(user);

user.name = "Brian";
user.country = "UK";
user.sayHello = function () {
    console.log("Hello my name is " + user.name + " and I live in " + user.country);
};

console.log(user.name, user.country);

console.log(user.sayHello());


// // utiliser un constructeur
function User(name, country, age) {
    (this.name = name),
    (this.country = country),
    (this.age = age);
}

const john = new User("John", "USA", 23);
console.log(john);

console.log(john.name);
console.log(john.country);
console.log(john.age);



// 1. recuperer le tableau et le stocker dans une variable

// 2. cliquer sur un bouton qui va appeller la fonction

// 3. creer une fonction qui va chercher une valeur alétoire dans le tableau