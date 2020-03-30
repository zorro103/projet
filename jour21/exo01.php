<?php

//ETAPE 1 : DECLARER LA FONCTION
 function compare ($nombre1, $nombre2) 
 {
     if ($nombre1 < $nombre2)
     {
         $resultat = $nombre1;
     }
     else
     {
         $resultat = $nombre2;
     }

// IL FAUT RENVOYER LE PLUS PETIT DES 2 NOMBRES
     return $resultat;
 }

//ETAPE 2 : APPEL DE LA FONCTION
//2 FOIS AVEC DES VALEURS DIFFERENTES

 $resultat = compare (4, 5);

echo "<p>Ceci est le 1er résultat : $resultat</p>";

$resultat = compare (156, 25);

echo "<p>Ceci est le 2eme résultat : $resultat</p>";