<<<<<<< HEAD
<?php

class Balise
{
    // PROPRIETE 
    public $innerHTML = "";

    // METHODES
    function __construct($param1)
    {
        $this->innerHTML = $param1;

        echo "<section>";

        echo $this->innerHTML;
    }

    function __destruct()
    {
        echo "</section>";
    }

}

$balise = new Balise("le texte dans ma balise");
=======
<?php

class Balise
{
    // PROPRIETE 
    public $innerHTML = "";

    // METHODES
    function __construct($param1)
    {
        $this->innerHTML = $param1;

        echo "<section>";

        echo $this->innerHTML;
    }

    function __destruct()
    {
        echo "</section>";
    }

}

$balise = new Balise("le texte dans ma balise");
>>>>>>> e3dbcfcf122cc0cdebc092107e8284ec9e1710d2
