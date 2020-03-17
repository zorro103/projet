<?php

    //ETAPE 1 : DECLARATION DE LA FONCTION
    // Là je crée ma fonction qui va agir sur mon Tableau
function nomDeMaFonction ($tabNombre)
{
    // print_r sert à afficher les valeurs entrées dans le tableau $tabNombre
    // print_r($tabNombre);
    
    // ETAPE 3 : AFFECTATION DES VALEURS DANS LE TABLEAU
    // LE PLUS FACILE -> foreach
    // Avec foreach j'AFFECTE une valeur une par une à chaque $nombre dans mon tableau $tabNombre
    // En fait je crée le tableau avec une boucle foreachbla
    foreach($tabNombre as $nombre)
    {
        //ETAPE 4 : EXTRACTION
        // J'extrait et j'affiche avec echo les valeurs du tableau
        echo "($nombre)";
    }

}

    //ETAPE 2 : APPEL DE LA FONCTION 
    // ALIMENTATION DU TABLEAU
    // Là j'ALIMENTE mon tableau avec les valeurs
    // Les valeurs d'un tableau sont entre crochets
    nomDeMaFonction ([2, 7, 18, 92]);
