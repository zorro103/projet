function AfficherPopup(){
    //je vais chercher ma div avec ID "pop1"
    var element = document.getElementById("pop1");
    //je switche sur l'autre classe
    element.classList.toggle("popup-show");
}

// je regarde si on clique sur le h1
document.querySelector("h1").addEventListener("click", AfficherPopup);

// Même chose lorsque la souris sors de la fenêtre
window.addEventListener("mouseleave", AfficherPopup);


document.getElementById("Bouton").addEventListener("click", AfficherPopup2);
    function AfficherPopup2() {
    alert ("Ceci est un autre Popup Chiant")
};
