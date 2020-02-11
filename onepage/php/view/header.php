<?php
// POUR INTRO
$nom="Claude";
$age="40";
// POUR FOOTER
$licence="Tous Droits Réservés";
$classebody="index";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON CV</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="<?php echo $classebody ?>">
    <header class="intro" id="haut">
        <nav class="nav-container">
            <a href="index.php">Accueil</a>
            <a href="#section1" title="Aller à Compétences">Compétences</a>
            <a href="#section2">Expériences</a>
            <a href="#section3">Formation</a>
        </nav>
        <h1>LE CV de <?php echo $nom ?? "Nom par défaut" ?></h1>  
        <p>Age : <?php echo $age ?></p>    
    </header>
    <main>
        