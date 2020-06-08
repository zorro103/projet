<?php
// AJOUTER LE CODE POUR AFFICHER coucou

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...
// ETAPE 1
// DECLARATION DE LA CLASSE
class Exo1 {
    public function afficherMsg(){
   echo "coucou";
   }
};

// CODE NON MODIFIABLE 
// (LAISSER CE CODE TEL QUEL SINON TU PAIES UNE AMENDE...)
// ETAPE 2
// AVEC LA POO
// ON DOIT INSTANCIER UN OBJET DEPUIS LA CLASSE
// AVEC L'OPERATEUR new
// UN OBJET EST UNE VALEUR QU'ON PEUT MEMORISER DANS UNE VARIABLE
$objet = new Exo1;

// ETAPE 3
// ET ENFIN, ON PEUT APPELER LA METHODE A TRAVERS L'OBJET
// -> OPERATEUR D'ACCES
$objet->afficherMsg();



// CORRECTION 

class Exo2 {
    public function afficherMsg(){
   echo "coucou";
   }
};