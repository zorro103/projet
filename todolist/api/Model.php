<?php

// on a besoin d'une connection à la BDD
require_once 'Database.php';

// on a besoin d'une classe qui va gérer les interactions avec la BDD
// CRUD

class Model {

    // INSTANCIATION
    // On crée une méthode qui va nous permettre une nouvelle instance de la classe Database & qui va retourner un objet PDO
    // Cette Méthode sera privée, elle ne sera pas accessible que depuis cette classe
    private function getConnection() {
        // On va créer une nouvelle instance de la Database
        $db = new Database();
        // Ici je retourne un objet PDO que je pourrai utiliser pour mes requ§tes
        return $db->connect();
    }
    
    // READ 
    // POUR RECUPERER LA BASE
    public function getTodos() {
        //On établit la connection à la BDD
        $pdo = $this->getConnection();

        // On récupère nos données
        $query = 'SELECT * FROM todos'; // Ceci est juste une chaine de caractères

        $PdoStatement = $pdo->prepare($query);

        $PdoStatement->execute();

        // Debug : affichage du résultat
        // print_r($PdoStatement->fetchAll());

        // Je return le résultat de ma requête
        return $PdoStatement->fetchAll();
    }

    // CREATE
    // ici $todo sera un tableau associatif avec comme clés title, description
    /* $todo = [
        "title" => "Titre de la tâche";
        "description" => "Description de la tâche";
    ]; */
    public function createTodo($todo) {
        //On établit la connection à la BDD
        $pdo = $this->getConnection();

        // On effectue la requête en Insertion
        $query = 'INSERT INTO todos (title, description) VALUES (:title, :description)';

        // On prépare la requète
        $PdoStatement = $pdo->prepare($query);

        // On exécute la requête en passant les bonnes valeurs avec execute
        // On retourne le résultat de la requête (true or false) avec return
        // fix values for execute method (cannot contain id)
        return $PdoStatement->execute($todo);
    }

    // UPDATE
    // public function updateTodos() {

    // }

    // DELETE
    public function deleteTodo($todo) {
        //On établit la connection à la BDD
        $pdo = $this->getConnection();

        // On effectue la requête en Insertion
        $query = 'DELETE FROM todos WHERE id = :id';

        // On prépare la requète
        $PdoStatement = $pdo->prepare($query);

        // On exécute la requête en passant les bonnes valeurs avec execute
        // On retourne le résultat de la requête (true or false) avec return
        return $PdoStatement->execute($todo);
    }

}



// POUR VERIFIER SI ON RECOIT BIEN LES DONNEES DE LA BASE
// $model = new Model();
// $response = $model->getTodos(); // Pour voir si on récupère bien la table 


// POUR VERIFIER SI ON ENVOIE BIEN LES DONNEES A LA BASE
// $model = new Model();
// $response = $model->createTodo([
//     'title' => 'Test Titre CREATE', 
//     'description' => 'Test description CREATE',
//     ]
// );
// var_dump($response);


// POUR VERIFIER SI ON EFFACE BIEN LES DONNEES DANS LA BASE
// $model = new Model();
// $response = $model->deleteTodo([
//     'id' => '3'
//     ]  
// );
// var_dump($response);


