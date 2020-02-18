<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POPUP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Popup Mystère</h1> 

    <!-- METHODE 1 -->
    <div class="popup-hidden" id="pop1">
        <h2>Ceci est un Popup bien pénible</h2>
        <p>Et vous ne pouvez même pas le fermer</p>
    </div> 

    <!-- METHODE 2 -->
    <button id="Bouton">Afficher un popup</button>

    <!-- Bonne pratique : positionner les scripts avant la fermeture du body pour limiter le temps de chargement au départ -->
    <script type="text/javascript" src="assets/js/popup.js"></script>

</body>
</html>