<?php

//ETAPE 1 : DECLARER LA FONCTION

function compteNbPairs ($tabNombre)
{
    var_dump($tabNombre);

    foreach ($tabNombre as $nombre)
    {
        if (($nombre % 2) == 0)
        {
            $nombrePair = 1;
        }
        else {
            $nombrePair = 0;

        }

    }
}   

    // $resultat = compteNbPairs();


   


// IL FAUT RENVOYER LE NB DE CHIFFRES PAIRS
    




/*

 $ajouterNbPairs {
        $nombrePair [i] + $nombrePair [i++];
    }

return $resultat;


*/


//ETAPE 2 : APPEL DE LA FONCTION
$tabNombre = [8, 5, 12, 32, 7, 21, 18];
$resultat = compteNbPairs ($tabNombre);

echo "<p>$resultat</p>";


function faireCalcul ($entree1, $entree2, $entree3, $entree4)
{
}

function faireCalcul2 ($tabEntree)
{
}

// ICI ON PASSE 4 PARAMETRES
faireCalcul(1, 2, 3, 4);
// ICI ON PASSE UN SEUL PARAMETRE QUI CONTIENT PLUSIEURS VALEURS
faireCalcul2([8, 5, 12, 32, 7, 21, 18])


?>