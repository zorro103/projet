<?php


// Pour se connecter à sa base de données snowden sur son localhost


// require_once 'Db.php';

// $pdo = new Db();

// $dbh = $pdo->connect();

// paramètres :
// adresse du serveur de BDD : string
// nom d'utilisateur BDD : string
// mdp BDD : string
try {
    $pdo = new PDO('mysql:host=localhost;dbname=snowden;charset=utf8', 'root', '');
    echo 'Succesfully connected to database';
} catch (PDOException $error) {
    echo 'Failed connecting to database : '.$error->getMessage();
}

