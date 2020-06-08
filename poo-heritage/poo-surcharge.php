<<<<<<< HEAD
<?php

class Employe
{
    function travailler ()
    {
        echo "<h3>(Employe travailler)</h3>";
    }
}


class Developpeur
    extends Employe         // LA CLASSE ENFANT Developpeur HERITE DE LA CLASSE PARENTE Employe
{
    function travailler ()
    {
        echo "<h3>(Developpeur travailler)</h3>";
    }
}

$developpeur = new Developpeur;
$developpeur->travailler();         // QUELLE METHODE PHP VA APPELER ? CELLE DU PARENT OU CELLE DE L'ENFANT

// PHP DONNE LA PRIORITE A LA METHODE ENFANT
// (MOTIVATION: $developpeur EST CREE A PARTIR DE LA CLASSE ENFANT Developpeur...)

=======
<?php

class Employe
{
    function travailler ()
    {
        echo "<h3>(Employe travailler)</h3>";
    }
}


class Developpeur
    extends Employe         // LA CLASSE ENFANT Developpeur HERITE DE LA CLASSE PARENTE Employe
{
    function travailler ()
    {
        echo "<h3>(Developpeur travailler)</h3>";
    }
}

$developpeur = new Developpeur;
$developpeur->travailler();         // QUELLE METHODE PHP VA APPELER ? CELLE DU PARENT OU CELLE DE L'ENFANT

// PHP DONNE LA PRIORITE A LA METHODE ENFANT
// (MOTIVATION: $developpeur EST CREE A PARTIR DE LA CLASSE ENFANT Developpeur...)

>>>>>>> e3dbcfcf122cc0cdebc092107e8284ec9e1710d2
