<section id="section-contact">
        <h2>Contact</h2>
        <!-- Methode GET ou POST -->
        <form action="#section-contact" method="post">
            <input type="text" name="nom" placeholder="Entrez votre Nom" required>
            <input type="email" name="email" placeholder="Entre votre Email" required>
            <textarea name="message" id="" cols="60" rows="6" placeholder="Entrez votre Message" required></textarea>
            <button type="submit" class="big-button">Envoyer votre message</button>
            <div class="confirmation">

            <?php

            // ETAPE 2: APACHE
            // LES INFOS ENVOYEES PAR LE FORMULAIRE PASSENT D'ABORD A APACHE
            // ET APACHE LES TRANSMET A PHP

            // ETAPE 3: PHP
            // EN PHP, ON RECUPERE LES INFOS DANS UN TABLEAU ASSOCIATIF
            // $_REQUEST (PLUS SIMPLE... MAIS IL Y A DES SCENARIOS PLUS COMPLIQUES OU $_REQUEST NE CONVIENT PAS...)
            // $_POST
            // $_GET
            // $_COOKIES

            // IL FAUT DISTINGUER SI LE FORMULAIRE A ETE ENVOYE OU PAS
            if (count($_REQUEST) > 0)
            {
                // SI LE FORMULAIRE A ETE ENVOYE
                // echo "SCENARIO1: FORMULAIRE ENVOYE";
                // IL FAUT RECUPERER LES INFOS DU FORMULAIRE
                // <input name="nom">

                // On récupère les valeurs rentrées dans le formulaire dans des variables $
                $nom        = $_REQUEST["nom"];
                $email      = $_REQUEST["email"];
                $message    = $_REQUEST["message"];

                // DEBUG
                echo "merci de votre message $nom ($email)";

                // ETAPE 4: SQL
                // ON VEUT MAINTENANT ENREGISTRER CE MESSAGE DANS UNE TABLE SQL
                // IL FAUT CONSTRUIRE LA BONNE REQUETE SQL

                // on crée notre requête que l'on va communiquer à notre BASE de Données vitrine puis dans la table contact
                $requeteSQL =
                <<<CODESQL
                INSERT INTO contact 
                (nom, email, message) 
                VALUES 
                ('$nom', '$email', '$message');
                CODESQL;

                // DEBUG
                // CODE SQL A ENVOYER
                // echo $requeteSQL;
                // IL FAUT QUE PHP SE CONNECTE A SQL
                // ET ENSUITE ENVOIE LA REQUETE SQL
                // https://www.php.net/manual/fr/pdo.construct.php

                // On se connecte à notre BASE vitrine
                $pdo = new PDO("mysql:dbname=vitrine;host=localhost;charset=utf8;", "root", "" );

                // CODE FACILE MAIS PAS ASSEZ SECURISE
                // => ON VA FAIRE UN CODE PLUS COMPLIQUE ENSUITE

                // ICI ON ENREGISTRE LES INFOS DANS LA TABLE SQL contact
                // https://www.php.net/manual/fr/pdo.exec.php

                // on envoie la requête obtenue précédemment vers notre BASE vitrine
                $pdo->exec($requeteSQL);

            }

            ?>
            </div>
        </form>
    </section>