<?php

// On va chercher les Constantes de la BASE qu'on a définit dans config.php
require_once 'config.php';


// POUR ETABLIR LA CONNECTION A LA BASE
class Database {

    // Cette propriété va contenir une instance de la classe PDO
    public $conn;

    // On déclare les propriétés
    private $dsn;
    private $username;
    private $pwd;
    private $options;

    // On déclare les méthodes

    // le constructeur est exécuté immédiatement lors de la création d'une nouvelle instance de la classe (un nouvel objet)
    // ref sur les constructeurs : https://www.w3schools.com/php/php_oop_constructor.asp 
    public function __construct() {
        
        // ici on va set (affecter) les propriétés de la classe avec les valeurs de notre config.php pour qu'on puisse les utiliser
        $this->dsn = DSN;
        $this->username = USERNAME;
        $this->pwd = PWD;
        $this->options = OPTIONS; 
    }

    public function connect() {
        try {
            // on va stocker dans la propriété de classe conn une nouvelle instance de l'objet POO
            $this->conn = new PDO($this->dsn, $this->username, $this->pwd, $this->options);
            // on vérifie qu'on est bien connecté à la base avec un echo
            echo 'Connection Etablie ! ';
        } catch (\PDOException $error) {
            echo 'Error : '.$error->getMessage();
        }
        return $this->conn;
    }
}

// POUR VERIFIER SI ON EST BIEN CONNECTE (le message s'affiche dans le corps de la page)
// $objet = new Database();
// $pdo = $objet->connect();

// ou ça qui revient au même (enfin pas exactement, à revoir)
// return $objet->connect();


// ------------------------------------------------------------------------------------------

// pour exemple seulement :

// class User
// {
        // propriétés de classe
//     public $name;
//     public $address;
//     public $country;

//     // méthodes de classe
//     public function __construct($name, $address, $country)
//     {
//         $this->name = $name;
//         $this->address = $address;
//         $this->country = $country;
//     }
// }

// instanciation de la classe
// $user1 = new User('lionel', 'Marseille', 'France');
// $name = $user1->name;



