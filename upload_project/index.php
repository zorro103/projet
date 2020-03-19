<?php
    require_once 'lib/functions.php';
    // On se connecte à la base
    $pdo = getConnection();

    // $string ='Hello les Guys';

    //echo sert à afficher la chaîne de caractères
    // echo "$string";

    // var_dump "$string";

    // print_r sert à afficher le tableau
    //print_r($string);

    // permet d'afficher que c'est un tableau
    // print_r($_REQUEST);

    // superglobales php
    // $_GET
    // $_POST
    // $_REQUEST contient les 3 réunies
    // $_REQUEST =>  $_GET, $_POST, $_COOKIES
    // $_SERVER
    // $_SESSION
    // $_FILES
    handleRequest($_FILES);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Project</title>
</head>
<body>
    <h1>File Upload</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file-upload"></label>
        <input type="file" name="fileUpload" id="file-upload">
        <button type="submit" name="submit">Save</button>
    </form>   
</body>
</html>