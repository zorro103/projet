<?php
    $params = parse_ini_file('bd.ini');
    //var_dump($params);
    
    $pdo = new PDO($params['url'], $params['user'], $params['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
    ini_set('display_error', 1);

    echo "connecté à la base\n";


?>