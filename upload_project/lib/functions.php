<?php

// FONCTION 1 : CONNECTION A LA BASE
// On appelle config.php qui contient les infos de la base nécessaires
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

// FONCTION 2 : POUR REMPLACER LES EVENTUELS ESPACES PAR UN TIRET "-" ET POUR CREER UN NOM DE FICHIER AVEC UN INDENTIFAINT UNIQUE EN PLUS
// on crée ici une fonction utilitaire pour formater une chaîne de caractères et retourner une nouvelle chaîne avec un identifiant unique
function createUniqueString($string, $delimiter) {

            // ---------- A GARDER ?
            //On extrait le code suivant dans une fonction utilitaire qu'on pourra réutiliser si besoin. La fonction prendra en paramètre une chaîne de caractères et retournera une nouvelle chaîne de caractères correspondant au nouveau nom de fichier
            // --------


            // LA ON REMPLACE UN EVENTUEL ESPACE DANS LE NOM DU FICHIER PAR UN TIRET -    
            // on utilise une expression régulière pour trouver les espaces dans une chaîne de caractères
            // Les 2 slashs extérieurs sont des délimiteurs qui servent à faire comprendre à PHP que c'est une expression régulière, ici :   espace = \s
            // Pour les espaces voir dans https://regex101.com/ et chercher space en bas à droite et on rentre any whitespace character
            $pattern = '/\s/';
            // on utilise preg_replace pour les remplacer
            $newString = preg_replace($pattern, $delimiter, $string);

            // on va générer un identifiant unique pour le fichier qu'on va sauvegarder pour éviter des conflits entre les noms des fichiers
            // PAR EXEMPLE ON VA AVOIR 5656567567-logo01.png
            return uniqid()."-".$newString;
}

// FONCTION 3 : "EST CE QUE L'EXTENSION EST AUTORISEE"
function isExtensionAuthorized($mimeType, $tableauExtension) {

        // On doit récupérer l'extension du fichier dans la variable $type
        // Pour ça on va utiliser la fonction PHP explode()
        // ressource : https://www.php.net/manual/fr/function.explode.php
        // la valeur de la variable $type => image/extension

        // On crée un tableau contenant le type et l'extension en les séparant par un /
        // du style image(en fait type) / extension
        $mimeType = explode("/", $mimeType);

        // On sélectionne l'extension dans le tableau qu'a renvoyéee la fonction explode()
        // là on récupère la seconde valeur du tableau c'est à dire l'index 1
        // On utilise la fonction strtolower() pour passer l'extension en minuscule (au cas où ce serait .JPG par exemple)
        $extension = strtolower($mimeType[1]);

        // On va vérifier que l'extension qu'on a récupérée correspond aux extensions autorisées
        // pour faire ça on va utiliser la fonction php in_array()              
        // si l'extension n'est pas dans le tableau des extensions autorisées, on affiche un message à l'utilisateur et on stoppe le script
        // A NOTER : si l'on met "!" devant in_array on récupère l'inverse ie ce qui n'est pas dans le tableau
        if (in_array($extension, $tableauExtension)) {
            return true;
        }

        return false;
}

// FONCTION 4 : "EST CE QUE LA TAILLE EST VALIDE"
function isValidSize($size, $maxSize) {

        // On doit maintenant vérifier que la taille du fichier à uploader ne dépasse pas une certaine limite
        if ($size > $maxSize) {
            return false;
        }

        return true;
        // OU PLUS SIMPLEMENT
        // return $size < $maxSize;
}


    // FONCTION PRINCIPALE
    // -------------------
    // On crée ici une fonction qui prendra en paramêtre une requête et qui traitera les données de notre formulaire
    function handleRequest ($request) {

        // POUR AFFICHER LE TABLEAU ENVOYé
        //print_r($request);

        // On vérifie que la variable existe
        if (isset($request['fileUpload'])) {   

            // On utilise extract pour se faciliter la vie et extraire les valeurs d'un tableau associatif dans des variables dont le nom correspond aux clés du tableua
            // On extrait les variables du tableau donc
            extract($request['fileUpload']);

            // si on n'utilisait pas extract() on pourrait écrire note code comme ça
            // $name = $request['fileUpload']['name'];
            // $type = $request['fileUpload']['type'];
            // $tmp_name = $request['fileUpload']['tmp_name'];
            // $error = $request['fileUpload']['error'];
            // $size = $request['fileUpload']['size'];

            // ON PEU AUSSI FAIRE UN DEBUG ONLY pour voir le tableau fileupload
            // print_r($request['fileUpload']);

            // echo ' , clé fileUpload bien reçue'; 

            // ON CHECKE SI ON A PAS D'ERREUR LORS DE l'UPLOAD
            // ressource pour la gestion des erreurs d'upload  : https://www.php.net/manual/fr/features.file-upload.errors.php
            // == compare valeurs
            // === compare valeurs et type, par exemple nb et chaine de caractères
            // *** VOIR TOUTES LES ERREURS TOUT EN BAS
            if (UPLOAD_ERR_OK === $error) {

                // VOIR FONCTION 2
                // LA ON CREEE UNE CHAINE DE CARACTERE UNIQUE AVEC LE NOM donné et LE TIRET
                $fileName = createUniqueString($name, "-");

                // VOIR FONCTION 3
                // VERIFICATION DE L'EXTENSION
                // On va vérifier si l'extension du fichier correspond bien à un fichier image
                $authorizedExtensions = [
                    "jpg",
                    "jpeg",
                    "png",
                    "svg",
                ];

                // ON CHECKE SI L'EXTENSION EST AUTORISEE AVEC LA FONCTION isExtensionAuthorized
                // en vérifiant dans  le tableau $authorizedExtensions            
                $checkExt = isExtensionAuthorized($type, $authorizedExtensions);

                // VOIR FONCTION 4
                // PUIS ON CHECKE SI LA TAILLE EST EN DESSOUS DE LA VALEUR MAX AVEC LA FONCTION isValidSize
                $checkSize = isValidSize($size, '1000000');

                // ON CHECKE FONCTION 3 + FONCTION 4
                // ET ON RENVOIE SI UNE DES 2 CONDITIONS EST FALSE EN ECHO : Vérifiez blablabla, SINON return
                if (false === $checkExt || false === $checkSize) {
                    echo "Verifiez l'extension ou la taille du fichier. Upload impossible";

                    return;
                }      
                
                // ICI ON ENVOIE NOTRE IMAGE DANS UPLOAD ------------------------------------------------------
                // ON SE CONSTRUIT D'ABBORD UN CHEMIN POUR L'ENREGISTREMENT DE L'IMAGE EN LOCAL
                // On spécifie à quel endroit on va sauvegarder nos images sur le serveur (en local enfin sur XAMPP)
                $uploadsDir = "uploads/";

                // on donne une valeur path pour simplifier le chemin du dossier
                $path = $uploadsDir.$fileName;
                
                // ICI ON VA SAUVEGARDER L'IMAGE DANS NOTRE DOSSIER UPLOAD -------------------------------------
                // On va utiliser une fonction PHP : move_uploaded_file()
                // cette fonction renvoie true si tout c'est bien passé sinon elle renvoie false

                // 1er paramètre : chemin vers le stockage temporaire de l'image
                // $tmp_name et /temp/imageXX.jpg sont par défaut et non modifiables, c'est le navigateur qui gère ça
                // 2ème paramètre : chemin complet vers le lieu de stockage sur le serveur local (dans notre dossier upload quoi)
                // par exemple il ira là : uploads/5656567567-logo01.png
                if (move_uploaded_file($tmp_name, $path)) {
                    
                    //echo "le fichier {$fileName} a bien été sauvegardé";

                    // VOIR FONCTION 1
                    // ICI ON VA ENVOYER L'IMAGE SUR LA BDD ----------------------------------------------------

                    // ETAPES :

                    // ON SE CONNECTE A LA BASE AVEC LA FONCTION getConnection
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
        } else {
            // *** CA C'EST POUR TOUTES LES ERREURS EVENTUELLES ET C'EST PREETABLI
            switch ($error) {
                case UPLOAD_ERR_INI_SIZE:
                    $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';

                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';

                    break;
                case UPLOAD_ERR_PARTIAL:
                    $message = 'The uploaded file was only partially uploaded';

                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message = 'No file was uploaded';

                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = 'Missing a temporary folder';

                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = 'Failed to write file to disk';

                    break;
                case UPLOAD_ERR_EXTENSION:
                    $message = 'File upload stopped by extension';

                    break;
                default:
                    $message = 'Unknown upload error';

                    break;
            }

            echo $message;
        }
    }
}