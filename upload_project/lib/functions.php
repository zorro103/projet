<?php
// On appelle config.php qui contien les infos de la base nécessaires
require_once 'config.php';

// ON SE CONNECT A LA BASE EN CREANT LA FONCTION getConnection() QUI VA CHERCHER LES VALEURS DANS config.php
function getConnection() {

    $options = [
        PDO ::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        // On essaie d'exécuter le code de la partie try
        $db = new PDO(DSN, USERNAME, PWD);
        //echo 'Successfully connected to DB';
    } catch (PDOException $error) {
        // si erreur, on gère l'erreur
        echo "Failed to connect to DB with error : {$error->getMessage()}";
    }

    return $db;
}

    // TO DO : créer une fonction qui prendra en paramêtre une requête et qui traitera les données de notre formulaire
    function handleRequest ($request) {

        // POUR AFFICHER LE TABLEAU ENVOYé
        //print_r($request);

        // On vérifie que la variable existe
        if (isset($request['fileUpload'])) {
            // On extrait la variable
            extract($request['fileUpload']);

            // echo ' , clé fileUpload bien reçue'; 

            // == compare valeurs
            // === compare valeurs et type, par exemple nb et chaine de caractères
            if (UPLOAD_ERR_OK === $error) {

                // Les 2 slashs extérieurs sont des délimiteurs qui servent à faire comprendre à PHP que c'est une expression régulière, ici :   espace = \s
                // Pour les espaces voir dans https://regex101.com/ et chercher space en bas à droite et on rentre any whitespace character
                $pattern = '/\s/';
                // On utilise preg_replace pour remplacer les espaces vides éventuels dans le nom du fichier par des tirets -
                $name = preg_replace($pattern, '-', $name);

                // On va générer un identifiant unique pour le fichier qu'on va sauvegarder et on y rajoute le nom pour éviter un éventuel écrasement
                $fileName = uniqid()."-".$name;

                // On spécifie à quel endroit on va sauvegarder nos images sur le serveur (en local enfin sur XAMPP)
                $uploadsDir = "uploads/";

                // on donne une valeur path pour simplifier le chemin du dossier
                $path = $uploadsDir.$fileName;


                // ICI  ON VA SAUVEGARDER L'IMAGE DANS NOTRE DOSSIER UPLOAD ----------------------------------------------------
                // On va utiliser une fonction PHP : move_uploaded_file()
                // cette fonction renvoie true si tout c'est bien passé sinon elle renvoie false

                // 1er paramètre : chemin vers le stockage temporaire de l'image
                // $tmp_name et /temp/imageXX.jpg sont par défaut et non modifiables, c'est le navigateur qui gère ça
                // 2ème paramètre : chemin complet vers le lieu de stockage sur le serveur local (dans notre dossier upload quoi)
                // par exemple il ira là : uploads/5656567567-logo01.png
                if (move_uploaded_file($tmp_name, $path)) {
                    
                    //echo "le fichier {$fileName} a bien été sauvegardé";

                    // ICI ON VA ENVOYER L'IMAGE SUR LA BDD --------------------------------------------------------------------

                    // ETAPES :

                    // On se connecte à la BDD
                    $pdo = getConnection();
                    // On écrit sa requête SQL
                    $sql = 'INSERT INTO images (name, path) VALUES (:name, :path)';
                    // On prépare la requête
                    $pdoStatement = $pdo->prepare($sql);

                    // On exécute la requête en associant les bonnes valeurs
                    //ON CREE UN TABLEAU POUR REMPLACER LES TOKENS
                    $file = [
                        ":name" => $name,
                        ":path" => $path,
                    ];

                    $pdoStatement->execute($file);

                    // On confirme à l'utilisateur par un message avec un lien vers l'image sur le serveur
                    echo "le fichier {$fileName} a bien été sauvegardé dans la BDD.<br>Il est visible <a href={$path}>ici</a>";
                }
                else {
                    echo "Erreur lors de la sauvegarde";

                    return;
                }
            }           
        } 
    }
