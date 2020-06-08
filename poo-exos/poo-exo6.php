<<<<<<< HEAD
<?php
// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
<header>
    <h1>TITRE1</h1>
</header>
<main>
    <section>
        CONTENU DE MA SECTION
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...


// CODE NON MODIFIABLE
new Info("h1",      "TITRE1");
new Info("section", "CONTENU DE MA SECTION");
new Info("footer",  "TOUS DROITS RESERVES");

$header = new Header;
$main   = new Main;
$footer = new Footer;

echo
<<<CODEHTML

$header
$main
$footer

=======
<?php
// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
/*
<header>
    <h1>TITRE1</h1>
</header>
<main>
    <section>
        CONTENU DE MA SECTION
    </section>
</main>
<footer>
    TOUS DROITS RESERVES
</footer>
*/

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...


// CODE NON MODIFIABLE
new Info("h1",      "TITRE1");
new Info("section", "CONTENU DE MA SECTION");
new Info("footer",  "TOUS DROITS RESERVES");

$header = new Header;
$main   = new Main;
$footer = new Footer;

echo
<<<CODEHTML

$header
$main
$footer

>>>>>>> e3dbcfcf122cc0cdebc092107e8284ec9e1710d2
CODEHTML;