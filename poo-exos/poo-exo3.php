<?php
// AJOUTER LE CODE MANQUANT EN POO
// POUR AFFICHER
// (header)
// (LE CONTENU DE MA PAGE)
// (footer)

// ... AJOUTER VOTRE CODE DIRECTEMENT ICI ...

class Page {
    public $content = "";
    public function setContenu($string) {
        $this->content = $string;
    }

    public function afficher() {
        echo "
        (header)<br>
        {$this->content}<br>
        (footer)
        ";
    }
};

// CODE NON MODIFIABLE
$objetPage = new Page;                              
$objetPage->setContenu("LE CONTENU DE MA PAGE");    
$objetPage->afficher(); 
