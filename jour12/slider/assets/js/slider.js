// je regarde si on clique sur le hamburger nav-button
document.querySelector(".nav-button").addEventListener("click", slideMenu);

function slideMenu(){
    //je vais chercher ma div avec class "menu-lateral"
    var element = document.querySelector(".menu-lateral");
    //je switche sur l'autre classe
    element.classList.toggle("menu-lateral-show");
}

