function SlideMenu(){
    //je vais chercher ma div avec ID "menu"
    var element = document.getElementById("menu-lateral");
    //je switche sur l'autre classe
    element.classList.toggle("menu-lateral-show");
}

// je regarde si on clique sur le hamburger
document.querySelector("hamburger").addEventListener("click", SlideMenu);