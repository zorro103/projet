<?php

// partie DSN : driver, host, nom bdd, encodage caractères
const DSN = 'mysql:host=localhost;dbname=todolist;charset=utf8';
// nom user mysql
const USERNAME = 'root';
// mot de passe mysql
const PWD = '';

//options PDO
const OPTIONS = [
    // On définit l'option d'affichage des résultats PDO sous la forme d'un tableau aoociatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // On spécifie qu'on veut récupérer les excetions éventuelles
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
