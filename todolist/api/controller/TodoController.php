<?php

class TodoController {

    // Propriétés de classe
    private $model;

    // constructeur prend en paramètre une instance de ma classe Model
    public function __construct($model) {

        $this->model = $model;

    }

    // méthodes de classe
    public function getAll() {

        //On stocke dans une variable le tableau renvoyé par getTodos
        $data = $this->model->getTodos();

        // Pour vérifier qu'on recoit bien le tableau
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';

        // Je veux vérifier s'il y a au moins 1 élément dans mon tableau
        if (count($data) > 0) {
            // code à exécuter si la condition est vraie
            // je construis ma réponse sous la forme d'un tableau associatif
            $response = [
                'status' => 'success',
                'message' => 'les données ont bien été récupérées',
                // On récupère le tableau stocké dans data
                'payload' => $data,
            ];
        }
        else {
            // code à exécuter si la condition est fausse
            $response = [
                'status' => 'error',
                'message' => 'Aucune donnees dans la table',
            ];       
        }

        // Je dois transfomer la tableau associatif de la réponse en JSON qui va pouvoir être compris et exploité par JS
        echo json_encode($response);
    }

    // create : prend en paramètre une request de type POST
    public function create($request)
    {
        // la request va contenir les infos du formulaire
        // je vérifie si j'ai bien title et description dans ma requête
        if (isset($request['title'], $request['description'])) {
            $todo = [
                'title' => $request['title'],
                'description' => $request['description'],
            ];

            if ($this->model->createTodo($todo)) {
                $response = [
                    'status' => 'success',
                    'message' => 'La nouvelle tache a bien ete enregistree',
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Echec de creation de la nouvelle tache',
                ];
            }

            echo json_encode(($response));
        }

        // si la méthode createTodo de la classe Model renvoie true
        // reponse de type success
        // sinon réponse de type erreur
    } 

    // Update

    // Delete

}

// DEBUG ONLY !!!
// on a besoin d'une connection au model
// require_once '../Model.php';

// // on crée une nouvelle instance de la classe Model
// $model = new Model();

// // on crée une nouvelle instance de la classe TodoController et on lui passe l'instance de la classe Model su'on vient de créer
// $controller = new TodoController($model);

// $todo = [
//     'title' => 'titre test méthode create',
//     'description' => 'description test',
// ];

// // on appelle la méthode getAll de la classe TodoController
// $controller->create($todo);