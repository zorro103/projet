<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section>
        <h1>TODOLIST AJAX</h1>
        <form action="" method="post">
            <div>
                <label id="title" for="title">Titre de la tâche</label>
                <input type="text" id="title" name="title" placeholder="Entrez le titre de la tâche" required>
            </div>
            <div>
                <label id="title" for="descripttion">Description de la tâche</label>
                <input type="text" id="descripttion" name="descripttion" placeholder="Entrez la description de la tâche" required>
            </div>
            <button class="bouton">Enregistrer Tâche</button>

        </form>
        <div class="todos">

        </div>
    </section>

    <script src="assets/js/app.js"></script>
    
</body>
</html>