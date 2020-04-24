// ON VA PRENDRE LA MAIN SUR LE FORMULAIRE
// ON VA BLOQUER L'ENVOI CLASSIQUE DU FORMULAIRE    => EVENEMENT submit SUR LE FORMULAIRE
// ET ON VA ENVOYER LES INFOS DU FORMULAIRE PAR AJAX
// AVANTAGE: ON NE RECHARGE PAS LA PAGE... 
//          (PLUS FLUIDE POUR LE VISITEUR, PLUS PERFORMANT...)
// ETAPE1: DECLARATION DE LA FONCTION
// => CODE EN ATTENTE
// POUR SAVOIR QUE CETTE FONCTION CALLBACK A UN PARAMETRE => DOC DE JS...
// PB: querySeclector NE PERMET DE SELECTIONNER QU'UNE SEULE BALISE
// MAIS MAINTENANT, ON A PLUSIEURS FORMULAIRES EN AJAX
// var formulaire = document.querySelector("form.ajax");
var listeFormulaire = document.querySelectorAll("../../index.php/form.ajax");
// ON FAIT UNE BOUCLE POUR AGIR SUR CHAQUE FORMULAIRE UN PAR UN
listeFormulaire.forEach(function(formulaire){
    // POUR CHAQUE FORMULAIRE
    // ON VA BLOQUER LE FONCTIONNEMENT CLASSIQUE
    // ET ON VA ENVOYER LES INFOS PAR AJAX
    formulaire.addEventListener("../../index.php/submit", envoyerFormulaireAjax);
});
// QUAND ON CHARGE LA PAGE
// ON VA AUTOMATIQUEMENT DECLENCHER LE CLICK SUR LE FORMULAIRE read
// => CA EVITE AU VISITEUR DE LE FAIRE
document.querySelector("../../index.php/form.read button[type=submit]").click();
// LA FONCTION envoyerFormulaireAjax SERA APPELEE PAR JS (PAS PAR MOI)
//      (ET JS FOURNIRA LE PARAMETRE event...)
// QUAND IL SE PRODUIRA L'EVENEMENT submit SUR LE FORMULAIRE
// (QUAND LE VISITEUR VA APPUYER SUR LE BOUTON "CREER UNE TACHE")
// => FONCTION "CALLBACK"
// VERSION1: CLASSIQUE
function envoyerFormulaireAjax (event) 
{
    // LE PARAMETRE event NOUS SERT A BLOQUER LE FORMULAIRE CLASSIQUE...
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");
    // https://developer.mozilla.org/fr/docs/Web/Guide/Using_FormData_Objects
    // ON VA RECUPERER LES INFOS DU FORMULAIRE
    // ET ENSUITE ON VA ENVOYER LE REQUETE AJAX AVEC fetch
    var formulaire = event.target;
    // ON VA UTILISER UN OBJET DE LA CLASSE FormData
    // => CET OBJET SERVIRA DE CONTAINER AUX INFOS DU FORMULAIRE
    var formData = new FormData(formulaire);    
                                    // => AUTOMATIQUEMENT, 
                                    // formData VA ASPIRER TOUTES LES INFOS DU formulaire
                                    // COOL POUR NOUS ;-p
    // MAINTENANT ON PEUT ENVOYER LA REQUETE AJAX AVEC fetch
    var contenuForm = 
    {
        method: 'POST',     // NECESSAIRE POUR UPLOAD DE FICHIER
        body:   formData
    };
    // LA FONCTION fetch DE JS ENVOIE UNE REQUETE AJAX VERS api-ajax.php (le premier paramètre)
    fetch("api-ajax.php", contenuForm)
    // POUR LE READ IL FAUT COMPLETER LE CODE POUR RECUPERER LES DONNEES RENVOYEES PAR LE SERVEUR
    .then(function(responseServer) {
        // DEBUG
        console.log(responseServer);
        // EXTRAIRE UN OBJET JS DEPUIS LA REPONSE DU SERVEUR
        return responseServer.json();
    })
    .then(function(objetJSON) {
        // DEBUG
        console.log(objetJSON);
        // SI LE TABLEAU DES ARTICLES EST FOURNI PAR LE SERVEUR
        // ALORS JE VAIS M'EN SERVIR POUR CONSTRUIRE LE HTML
        if ('tableauArticle' in objetJSON)
        {
            // ON COPIE LE TABLEAU DANS NOTRE VARIABLE tableauArticle
            tableauArticle = objetJSON.tableauArticle;
            // => CE TABLEAU JSON SERA EN FAIT FOURNI PAR LE SERVEUR WEB (PHP + TABLE SQL)
            // => LES PROPRIETES SERONT CONSTRUITES A PARTIR DES NOMS DES COLONNES SQL
            rafraichirListeArticle();
        }
    })
    ;
};
var tableauArticle = [];    // CE SERA LE SERVEUR QUI VA ME CONSTRUIRE CE TABLEAU
// PROGRAMMATION FONCTIONNELLE
// => JE RANGE MON CODE DANS DES FONCTIONS
function rafraichirListeArticle ()
{
    // ON REMET LA LISTE A ZERO
    var baliseListTodo = document.querySelector(".listTodo");
    baliseListTodo.innerHTML = '';
    for(var indice=0; indice < tableauArticle.length; indice++)
    {
        var article = tableauArticle[indice];
        var codeHTML = 
        `
                    <article class="${article.statut}">
                        <h3>${article.titre}</h3>
                        <p>${article.description}</p>
                        <p>${article.statut}</p>
                        <p>${article.id}</p>
                        <img src="${article.photo}">
                    </article>
        `;
        // AJOUTER DANS LA BALISE listTodo
        baliseListTodo.innerHTML += codeHTML;
    }
}
/*
// VERSION 2: FONCTION ANONYME
var envoyerFormulaireAjax = function (event) 
{
    // LE PARAMETRE SERT A BLOQUER LE FORMULAIRE CLASSIQUE...
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");
};
formulaire.addEventListener("submit", envoyerFormulaireAjax);
// VERSION 3: COMPACTE
formulaire.addEventListener("submit", function (event) {
    // LE PARAMETRE SERT A BLOQUER LE FORMULAIRE CLASSIQUE...
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");
});
*/
// ON VEUT LE CODE JS 
// QUI PRODUISE LE HTML POUR LA LISTE DES TACHES
// REPETITION => TECHNIQUE:             BOUCLE
//                  AVEC COMME COMBO :  UN TABLEAU
/*
                <article>
                    <h3>tache1</h3>
                    <p>description1</p>
                </article>
                <article>
                    <h3>tache2</h3>
                    <p>description2</p>
                </article>
var tableauArticle = [
    { titre: 'tache1', description: 'description1' },
    { titre: 'tache2', description: 'description2' },
    { titre: 'tache3', description: 'description3' },
    { titre: 'tache4', description: 'description4' },
    { titre: 'tache5', description: 'description5' }    // NE PAS OUBLIER D'ENLEVER LA VIRGULE SUR LE DERNIER ELEMENT
];
*/