<section>
        <h2>Notre Catalogue</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus cum recusandae obcaecati vero, excepturi odio soluta harum dolores, id perspiciatis nihil quo, officia quibusdam iste voluptatum facilis totam corporis qui!</p>
        <!-- JE RAJOUTE UNE CLASSE POUR POUVOIR FACILEMENT SELECTIONNER LA BALISE EN JS -->
        <img class ="imagePrincipale" src="assets/img/voiture01.jpg" alt="voiture">
        <div class="container">

        <?php
        // AU LIEU D'AVOIR  MA LISTE 
        // <img src="assets/img/voiture01.jpg" alt="voiture 01">
        // <img src="assets/img/voiture02.jpg" alt="voiture 02">
        // <img src="assets/img/voiture03.jpg" alt="voiture 03">

        // JE DEMANDE A PHP DE RECUPERER LA LISTE DE TOUS LES FICHIERS QUI COMMENCENT PAR voiture
        // Pour tous les types je mets les types de fichiers entre accolades
        // $listeVoiture = glob("assets/img/voiture*.jpg");
        $listeVoiture = glob("assets/img/voiture*.{jpg,jpeg,gif,png}", GLOB_BRACE);

        // Puis j'écris le code HTML obtenu dans ma page
        foreach($listeVoiture as $image)
        {
        echo 
        <<<CODEHTML
        <img src="$image" alt="$image">
        CODEHTML;
        }
        ?>
     
        </div>
    </section>