<?php

// on a besoin d'une connection à la BDD
require_once 'Database.php';

// on a besoin d'une classe qui va gérer les interactions avecla BDD
// CRUD
class Model {

    // POUR RECUPERER LA BASE
    public function getTodos()
    {
        //On établit une connection
        $pdo = $this->getConnection();

        // On récupère nos données
        $query = 'SELECT * FROM todos'; // Ceci est juste une chaine de caractères

        $PdoStatement = $pdo->prepare($query);

        $PdoStatement->execute();

        // DEBUG AFFICHAGE DU RESULTAT
        print_r($PdoStatement->fetchAll());
    }

    // On crée une méthode qui va nous permettre une nouvelle instance de la classe Database & qui va retourner un objetPDO
    // Cette Méthode sera privée, elle ne sera pas accessible que depuis cette classe
    private function getConnection() {
        // On va créer une nouvelle instance de la Database
        $db = new Database();
        // Ici je retourne un objet PDO que je pourrai utiliser pour mes requ§tes
        return $db->connect();
    }

    public function createTodos($todo) {
        //On établit une connection
        $pdo = $this->getConnection();

        // On effectue la requête en Insertion
        $query = 'INSERT INTO todos (title, description) VALUES (:title, :description)';

        // On prépare la requète
        $PdoStatement = $pdo->prepare($query);

        // On exécute la requête en passant les bonnes valeurs avec execute
        // On retourne le résultat de la requête (true or false) avec return
        return $PdoStatement->execute($todo);
    }

    // public function updateTodos() {

    // }

    // public function deleteTodos() {

    // }

}

// POUR VERIFIER SI ON EST BIEN SI ON RECOIT BIEN LES DONNEES DE LA BASE
$model = new Model();

$response = $model->createTodos(
    ['titre' => 'Test Titre de la méthode CREATE', 'description' => 'Test description de la méthode CREATE',]
);

var_dump($response);

// $model->getTodos(); // Pour voir si on récupère bien la table 