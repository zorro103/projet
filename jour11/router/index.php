<?php

// On récupère le paramètre page dans l'url en GET qui n'est pas vide
// (!empty) veut dire l'inverse d'empty donc rempli
if (!empty($_REQUEST['page'])) {

    // on met le nom de la page en minuscules avec string to lower puis on construit le nom du template
    $page = strtolower($_REQUEST)['page']) . '.php';

    // On récupère la liste des templates avec scandir
    // 1 pour ordre croissant
    // https://www.php.net/manual/en/function.scandir.php
    $templates = scandir('templates', 1); 

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routeur PHP avec menu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="nav-container">
            <a href="index.php">Accueil</a>
            <a href="templates/portfolio.php">Portfolio</a>
            <a href="templates/about.php">About</a>
        </nav>
    </header>   
    <main>
        <section class="content">
            <h1>Bienvenue sur la page ACCUEIL</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, impedit quaerat magni dolores, architecto a nostrum maiores debitis cupiditate laudantium, vitae minus odit modi labore omnis. Nam laborum eligendi officiis.</p>
        </section>
    </main>  
</body>
</html>

