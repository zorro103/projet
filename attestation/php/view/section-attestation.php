
        <section>
            <h2>FORMULAIRE DE DECLARATION POUR ATTESTATION</h2>
            <form action="" method="post">
                <input type="text" name="nom" placeholder="Votre Nom" required>
                <input type="text" name="prenom" placeholder="Votre Prénom" required>
                <textarea name="adresse" id="" cols="60" rows="3" placeholder="Votre Adresse" required></textarea>
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

                <button type="submit" class="big-button">Enregistrer ma déclaration</button>

                <!-- IDENTIFIANT POUR QUE PHP PUISSE DISTINGUER LES FORMULAIRES -->
                <!-- invisible donc on peut rajouter cette balise en balise enfant de form mais dans l'ordre qu'on veut -->
                <input type="hidden" name="identifiantFormulaire" value="declaration">
                <!-- ce sera utile avec JS et ajax pour sélectionner la balise... -->
                <div class="confirmation">
                    <?php
                    // CODE POUR TRAITER LE FORMULAIRE

                    // ON SEPARE LE CODE DE NOS FONCTIONS DANS UN FICHIER COMMUN
                    require_once "php/mes-fonctions.php";


                    // ATTENTION: LE CODE PHP EST ASSOCIE AU CODE HTML
                    // <input type="hidden" name="identifiantFormulaire" value="declaration">

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

                                // ETAPE2: ACTIVER LE CODE DE LA FONCTION
                                insererLigneSQL("declaration", $tabAssoColonneValeur);
                                // PHP FAIT $nomTable = "declaration" 
                                // PHP FAIT $param1 = $tabAssoColonneValeur

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
