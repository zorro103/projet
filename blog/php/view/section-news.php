
        <section>
            <h1>Liste des Articles en PHP ET SQL (READ)</h1>
            <div class="listeArticle">
            <?php
            // ON VA FAIRE UNE BOUCLE POUR CREER CHAQUE ARTICLE
            // ET GENERALEMENT, ON A UN TABLEAU PHP SUR LEQUEL ON MET LA BOUCLE
            // => AVEC UN TABLEAU ASSOCIATIF, ON VA POUVOIR RECUPERER LES MEMES INFOS
            // EN PHP, UNE LIGNE SQL SERA UN TABLEAU ASSOCIATIF
            /*
            // LIGNE 1
            $tabAsso1 = [ 
                "id"                => 1, 
                "titre"             => "cornavirus", 
                "contenu"           => "sera-t-il bloqué par les frontières ?", 
                "image"             => "assets/img/photo1.jpg", 
                "datePublication"   => "2020-03-03 00:00:00", 
                "categorie"         => "sante"
            ];
            // LIGNE 2
            $tabAsso2 = [ 
                "id"                => 2, 
                "titre"             => "benjamin griveaux", 
                "contenu"           => "il est passé où le benjamin ?", 
                "image"             => "assets/img/photo1.jpg", 
                "datePublication"   => "2020-03-03 00:00:00", 
                "categorie"         => "politique"
            ];
            // ON VA UTILISER UN TABLEAU INDEXE DE TABLEAU ASSOCIATIFS
            $tabLigne = [
                $tabAsso1,
                $tabAsso2,
            ];
            */

            // CE QU'IL Y A AU DESSUS C'EST POUR ALIMENTER MA PAGE DIRECTEMENT ET NON PAS EN PASSANT PAR MA BASE


            // ------------------------------------------------------------------------------------------


            // ETAPE 1: LANCER UNE REQUETE SQL EN LECTURE
            // POUR RECUPERER LES INFOS DE SQL
            // JE LANCE UNE REQUETE SUR MES ARTICLES ET JE LES CLASSE PAR DATE DE PUBLICATION DU PLUS RECENT AU PLUS ANCIEN
            $requeteSQL =
            <<<CODESQL
            SELECT * FROM `articles`
            ORDER BY datePublication DESC
            CODESQL;

            $tabAssoColonneValeur =[];

            // ETAPE 2 : JE ME CONNECTE A LA BASE, JE CONNECTE PHP A SQL
            $pdo = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;", "root", "");
            // ENVOYER LA REQUETE   
            // https://www.php.net/manual/fr/pdo.query.php
            // ETAPE 2A : ON ENVOIE LA REQUETE PREPAREE
            // PDOStatement EST UN CONTAINER QUI ENGLOBE LES RESULTATS DE LA REQUETE SQL
            $pdoStatement = $pdo->prepare($requeteSQL);
            // ETAPE 2B : ON FOURNIT LES DONNEES EXTERIEURES A PART
            $pdoStatement->execute($tabAssoColonneValeur);


            // ETAPE 3: JE RECUPERE MON TABLEAU DE RESULTATS
            // https://www.php.net/manual/fr/pdostatement.fetchall.php
            $tabLigne = $pdoStatement->fetchAll();

            // ON FAIT UNE BOUCLE POUR AFFICHER CHAQUE ARTICLE
            foreach($tabLigne as $tabAsso)
            {
                $id              = $tabAsso["id"];
                $titre           = $tabAsso["titre"];
                $contenu         = $tabAsso["contenu"];
                $image           = $tabAsso["image"];
                $datePublication = $tabAsso["datePublication"];
                $categorie       = $tabAsso["categorie"];

                // SIMPLIFICATION
                // https://www.php.net/manual/fr/function.extract.php
                // extract CREE DES VARIABLES A PARTIR DES CLES DU TABLEAU ASSOCIATIF
                // extract($tabAsso); 

            // J'AFFICHE CHAQUE ARTICLE DANS MA PAGE
            echo
            <<<CODEHTML

                            <article class="$categorie">
                                <img src="$image" alt="photo">
                                <h2>$titre</h2>
                                <p>$contenu</p>
                                <p class="date">$datePublication</p>
                            </article>
            CODEHTML;
            }

            // LES INFOS QUI NOUS INTERESSENT SONT DANS UNE TABLE SQL articles
            // LA TABLE SQL A DES COLONNES titre, image, contenu, etc... 
            // ET LES INFOS SONT GROUPEES DANS UNE MEME LIGNE

            ?>

            </div>
        </section>
        
        <section>
            <h1>Liste des Articles en HTML</h1>
            <div class="listeArticle">
                <article>
                    <img src="assets/img/photo04.jpg" alt="photo">
                    <h2>Titre Article 04</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, delectus! Labore, similique veniam. Optio, similique itaque. Maiores perferendis reiciendis qui delectus consectetur, repellat praesentium repudiandae veniam, tenetur corporis labore officia.</p> 
                </article>
                <article>
                    <img src="assets/img/photo05.jpg" alt="photo">
                    <h2>Titre Article 5</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, delectus! Labore, similique veniam. Optio, similique itaque. Maiores perferendis reiciendis qui delectus consectetur, repellat praesentium repudiandae veniam, tenetur corporis labore officia.</p> 
                </article>
                <article>
                    <img src="assets/img/photo06.jpg" alt="photo">
                    <h2>Titre Article 6</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, delectus! Labore, similique veniam. Optio, similique itaque. Maiores perferendis reiciendis qui delectus consectetur, repellat praesentium repudiandae veniam, tenetur corporis labore officia.</p> 
                </article>
            </div>
        </section>
