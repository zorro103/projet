<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jour 13 Hide</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1 id ="title">Jour 13 - Hide</h1>
    <div id="div" class="wrapper">
        <div class="box hide">
            <h2>Section 01</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio illo doloribus necessitatibus veniam excepturi in inventore illum repudiandae vel voluptas provident, distinctio sapiente eos, dolor pariatur, consequuntur cumque cum eius!</p>
        </div>
        <div class="box hide">
            <h2>Section 02</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio illo doloribus necessitatibus veniam excepturi in inventore illum repudiandae vel voluptas provident, distinctio sapiente eos, dolor pariatur, consequuntur cumque cum eius!</p>
        </div>
        <div class="box hide">
            <h2>Section 03</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio illo doloribus necessitatibus veniam excepturi in inventore illum repudiandae vel voluptas provident, distinctio sapiente eos, dolor pariatur, consequuntur cumque cum eius!</p>
        </div>
    </div>
    <button>Click Me !</button>

    <!-- Bonne pratique : positionner les scripts avant la fermeture du body pour limiter le temps de chargement au départ -->
    <script src="assets/js/hide.js"></script>
    <?php require_once 'script.php'; ?>
</body>
</html>