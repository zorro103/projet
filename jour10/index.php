<?php
    require_once "php/model/glossaire.php";

        // print_r($glossaire);

    function displayRandomTerm($array)
    {
        /*
        count permet de savoir le nombre total de valeurs du tableau
        //en l'occurence 148
        */
        $length = count($array);

        /*
        Utilisation de la fonction PHP mt_rand pour générer un nombre alétoire
        https://www.php.net/manual/fr/function.mt-rand
        ici de 0 à 147 d'où le $length (148) - 1 = 147
        */
        $index = mt_rand(0, $length - 1);
        
        /*
        ----VERSION BASIQUE AVEC DES ECHO
        echo '<div class=container>';
            echo '<h1>';
            print_r($array[$index]['title']);
            echo '</h1>';
            echo '<p>';
            print_r($array[$index]['description']);
            echo '</p>';
        echo '</div>';
        /*
      
        /*
        On détermine que la variable $title est dans le tableau, dans index et correspond à title
        même chose pour description
        */
        $title = $array[$index]['title'];
        $description = $array[$index]['description'];

        /*On détermine le HTML en sortie*/
        $html = 
        <<<OUTPUT
        <div class="container">
            <h1>{$title}</h1>
            <p>{$description}</p>
        </div>
        OUTPUT;

        /*On crée la valeur html*/
        echo $html;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glossaire des termes OPQUAST</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form class="formulaire">
        <button type="submit" class="bouton">Afficher une définition Aléatoire</button>
    </form>
    <!--Va afficher ce que l'on souhaite depuis le glossaire-->
    <?php displayRandomTerm($glossaire); ?>
    
</body>
</html>