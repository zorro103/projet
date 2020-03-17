
        <section>
            <h2>FORMULAIRE DE DECLARATION POUR ATTESTATION</h2>
            <form action="" method="post">
                <input type="text" name="nom" placeholder="Votre Nom" required>
                <input type="text" name="prenom" placeholder="Votre Prénom" required>
                <textarea name="adresse" id="" cols="60" rows="6" placeholder="Votre Adresse" required></textarea>
                <h3>Cochez la raison de votre déplacement</h3>
                <label>
                    <input type="radio" name="raison" id="" value="courses alimentaires" required>
                    <span>Courses alimentaires</span>
                </label>

                <label>
                    <input type="radio" name="raison" id="" value="travail" required>
                    <span>Travail</span>
                </label>

                <label>
                    <input type="radio" name="raison" id="" value="aide aux proches" required>
                    <span>Aide aux Proches</span>
                </label>

                <label>
                    <input type="radio" name="raison" id="" value="necessité médicale" required>
                    <span>Nécessité Médicale</span>
                </label>

                <label>
                    <input type="radio" name="raison" id="" value="necessité familiale" required>
                    <span>Nécessité Familiale</span>
                </label>

                <label>
                    <input type="radio" name="raison" id="" value="sortie sport individuel" required>
                    <span>Sortie Sport Individuel</span>
                </label>

                <button type="submit">Enregistrer ma déclaration</button>

                <!-- IDENTIFIANT POUR QUE PHP SACHE QUEL FORMULAIRE IL DOIT TRAITER -->
                <input type="hidden" name="identifiantFormulaire" value="declaration">
                <!-- Ceci sera utile avec AJAX et JS  -->
                <div class="confirmation">
                    <?php
                    // CODE POUR TRAITER LE FORMULAIRE

                    // ON PEUT CREER DES FONCTIONS POUR NOUS FACILITER LE CODE
                    // AVANTAGE1: NE PAS DUPLIQUER DES BLOCS DE CODE IDENTIQUES
                    // AVANTAGE2: AJOUTER DU CODE DE SECURITE POUR FILTRER CHAQUE INFO EXTERIEURE

                    // ICI ON VA CHERCHER CHAQUE VALEUR DE INPUT DU FORMULAIRE
                    function filtrer ($name)
                    {
                        // SECURITE: ?? "" => SI LE NAVIGATEUR N'ENVOIE PAS L'INFO, ON PREND COMME VALEUR PAR DEFAUT ""
                        $info = $_REQUEST[$name] ?? "";
                        // ON POURRA RAJOUTER PLUS DE SECURITE
                        // ...

                        return $info;
                    }

                    // ATTENTION: LE CODE PHP EST ASSOCIE AU CODE HTML
                    // <input type="hidden" name="identifiantFormulaire" value="declaration">

                    // CODE POUR TRAITER LE FORMULAIRE
                    // VERIFIER SI LE FORMULAIRE A ETE ENVOYE
                    // $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
                    $identifiantFormulaire = filtrer("identifiantFormulaire");

                    if ($identifiantFormulaire == "declaration")
                    {

                        // ALORS JE VAIS RECUPERER LES INFOS
                        $tabAssoColonneValeur = [
                    //        "nom"     => $_REQUEST["nom"] ?? "",
                            "nom"       => filtrer("nom"),
                            "prenom"    => filtrer("prenom"),
                            "adresse"   => filtrer("adresse"),
                            "raison"    => filtrer("raison"),
                        ];
                        // VERIFIER ET VALIDER LES INFOS
                        // ASTUCE DU extract POUR CREER DES VARIABLES A PARTIR DES CLES
                        extract($tabAssoColonneValeur);
                        if ( $nom != ""
                            && $prenom != ""
                            && $adresse != ""
                            && $raison != "")
                            {
                                // ENREGISTRER LES INFOS DANS LA TABLE SQL
                                // IL MANQUE DES INFOS POUR LA TABLE SQL
                                // IL MANQUE numero et dateDeclaration
                                // => IL FAUT COMPLETER LES INFOS MANQUANTES
                                // https://www.php.net/manual/fr/function.uniqid.php
                                // => PHP VA CREER UNE COMBINAISON ALEATOIRE DE CHIFFRES ET DE LETTRES
                                $tabAssoColonneValeur["numero"] = uniqid();
                                // https://www.php.net/manual/fr/function.date.php
                                $tabAssoColonneValeur["dateDeclaration"] = date("Y-m-d H:i:s");

                                // MAINTENANT JE PEUX CONSTRUIRE LA REQUETE SQL PREPAREE
                                $requeteSQL =
                    <<<CODESQL
                    INSERT INTO declaration
                    (nom, prenom, adresse, raison, numero, dateDeclaration) 
                    VALUES 
                    (:nom, :prenom, :adresse, :raison, :numero, :dateDeclaration) 
                    CODESQL;
                                // ENSUITE, ON VA ENVOYER LA REQUETE SQL PREPAREE
                                // CONNECTER A SQL
                                
                                // ETAPE1: CONNECTER PHP A SQL
                                // ATTENTION: NE PAS OUBLIER DE CHANGER LA DATABASE...
                                $pdo = new PDO("mysql:host=localhost;dbname=attestation;charset=utf8;", "root", "");

                                // ETAPE2a: ON ENVOIE LA REQUETE PREPAREE
                                // PDOStatement EST UN CONTAINER QUI ENGLOBE LES RESULTATS DE LA REQUETE SQL
                                $pdoStatement = $pdo->prepare($requeteSQL);

                                // ETAPE2b: ON FOURNIT LES DONNEES EXTERIEURES A PART
                                $pdoStatement->execute($tabAssoColonneValeur);

                                // DEBUG
                                echo "votre déclaration est bien enregistrée. NOTEZ BIEN VOTRE NUMERO D'ATTESTATION {$tabAssoColonneValeur["numero"]}";
                        }
                        else
                        {
                            echo "VEUILLEZ FOURNIR TOUTES LES INFORMATIONS SVP...";
                        }

                    }
                    ?>
                </div>
            </form>
        </section>
