
        <section>
            <h1>FORMULAIRE DE CREATION D'ARTICLE</h1>
            
            <form class="admin" action="" method="POST">
                <input type="text" name="titre" placeholder="Entrez le Titre" required>
                <textarea name="contenu" id="" cols="60" rows="15" placeholder="Entrez le Contenu" required></textarea>
                <!-- POUR L'IMAGE ON DEVRAIT PROPOSER UN UPLOAD => ON VERRA PLUS TARD -->
                <input type="text" name="image" value="assets/img/photo03.jpg" required>
                <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
                <input type="text" name="categorie" placeholder="Entrez la Catégorie" required>
                <button type="submit" class="big-button">PUBLIEZ L'ARTICLE</button>
                <div class="confirmation">

                <?php
                // TRAITEMENT DU FORMULAIRE DE CREATION D'ARTICLE
                if (count($_REQUEST) > 0) 
                {
                // DEBUG
                // echo "JE DOIS TRAITER LE FORMULAIRE";

                // $_REQUEST EST UN TABLEAU ASSOCIATIF

                // ETAPE1: ON RECUPERE LES INFOS DU FORMULAIRE
                $titre = $_REQUEST["titre"];
                $contenu = $_REQUEST["contenu"];
                $image = $_REQUEST["image"];
                $datePublication= $_REQUEST["datePublication"];
                $categorie = $_REQUEST["categorie"];

                // ETAPE2: ON VA CONSTRUIRE LA REQUETE SQL INSERT
                $requeteSQL =
                <<<CODESQL

                INSERT INTO articles
                (titre, contenu, image, datePublication, categorie)
                VALUE
                ('$titre', '$contenu', '$image', '$datePublication', '$categorie')

                CODESQL;

                $tabAssoColonneValeur = [];

                // ETAPE3: ON VA ENVOYER LA REQUETE SQL 
                // POUR INSERER UNE NOUVELLE LIGNE DANS LA TABLE articles
                // CONNEXION A LA LA DATABASE
                $pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;", "root", "");
                // ENVOYER LA REQUETE   
                // https://www.php.net/manual/fr/pdo.query.php
                // PDOStatement EST UN CONTAINER QUI ENGLOBE LES RESULTATS DE LA REQUETE SQL
                $pdoStatement = $pdo->prepare($requeteSQL);
                $pdoStatement->execute($tabAssoColonneValeur);

                // MESSAGE DE CONFIRMATION
                echo "VOTRE ARTICLE A ETE PUBLIE";
                }
                ?>
                </div>
            </form>
        </section>
