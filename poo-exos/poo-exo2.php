<<<<<<< HEAD
<?php
// AJOUTER LE CODE POO POUR AFFICHER
/*
(header)
(section)
(footer)
*/

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class Header {
    public function afficherCode() {
        echo "(header)<br>";
    }
};

class Section {
    public function afficherCode() {
        echo "(section)<br>";
    }
};

class Footer {
    public function afficherCode() {
        echo "(footer)<br><br>";
    }
};

// CODE NON MODIFIABLE 
// (LAISSER CE CODE TEL QUEL SINON TU PAIES UNE AMENDE...)
// CODE NON MODIFIABLE
$objetHeader    = new Header;
$objetSection   = new Section;
$objetFooter    = new Footer;


$objetHeader->afficherCode();
$objetSection->afficherCode();
$objetFooter->afficherCode();



// CORRECTION AVEC CONSTRUCT

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...
class Header_B
{
    public function __construct()
    {
        echo '(header)<br>';
    }
}

 class Section_B
 {
     public function __construct()
     {
         echo '(section)<br>';
     }
 }

class Footer_B
{
    public function __construct()
    {
        echo '(footer)<br>';
    }
}

$objetHeader    = new Header_B;
$objetSection   = new Section_B;
=======
<?php
// AJOUTER LE CODE POO POUR AFFICHER
/*
(header)
(section)
(footer)
*/

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class Header {
    public function afficherCode() {
        echo "(header)<br>";
    }
};

class Section {
    public function afficherCode() {
        echo "(section)<br>";
    }
};

class Footer {
    public function afficherCode() {
        echo "(footer)<br><br>";
    }
};

// CODE NON MODIFIABLE 
// (LAISSER CE CODE TEL QUEL SINON TU PAIES UNE AMENDE...)
// CODE NON MODIFIABLE
$objetHeader    = new Header;
$objetSection   = new Section;
$objetFooter    = new Footer;


$objetHeader->afficherCode();
$objetSection->afficherCode();
$objetFooter->afficherCode();



// CORRECTION AVEC CONSTRUCT

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...
class Header_B
{
    public function __construct()
    {
        echo '(header)<br>';
    }
}

 class Section_B
 {
     public function __construct()
     {
         echo '(section)<br>';
     }
 }

class Footer_B
{
    public function __construct()
    {
        echo '(footer)<br>';
    }
}

$objetHeader    = new Header_B;
$objetSection   = new Section_B;
>>>>>>> e3dbcfcf122cc0cdebc092107e8284ec9e1710d2
$objetFooter    = new Footer_B;