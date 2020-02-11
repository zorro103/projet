<section class="competences" id="section1">
            <h2>Compétences</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <div class="container">
                <?php
                // ON VEUT OBTENIR LE MEME CODE AVEC PHP
                // REPETITION => BOUCLE
                // CE QUI SE REPETE VA DANS LA BOUCLE
                // CE QUI NE SE REPETE PAS VA DANS UN TABLEAU

                $tableau= ["photo01", "photo02", "photo03"];
                $tableauAlt= ["Image 01", "Image 02", "Image 03"];
                $tableauH3= ["Graphiste", "Développeur", "Formateur"];
                $tableauTexte= [
                    "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam corporis, incidunt ducimus molestias ut nulla, modi tempora, a possimus quaerat porro libero hic quis? Odio corporis error nobis ipsa sint.", 
                    
                    "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum quo temporibus nam eveniet debitis optio, recusandae eos iure deleniti in minima dolorum, maiores velit eum qui quas illo aut! Eligendi.", 
                    
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, nisi iure vel tempora aperiam delectus a et labore similique consectetur, nesciunt voluptatem quo eveniet pariatur. Laudantium mollitia repudiandae sint quidem."];

                for($compteur=0; $compteur < count($tableau); $compteur=$compteur+1)
                {
                echo 
                <<<codehtml
                <div class="colonne">
                    <img src="assets/img/$tableau[$compteur].jpg" alt="$tableauAlt[$compteur]">
                    <h3>$tableauH3[$compteur]</h3>
                    <p>$tableauTexte[$compteur]</p>
                </div>

                codehtml;
                }
                ?>
            </div>
        </section>
        <section class="experiences" id="section2">
            <h2>Experiences</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blan
                ditiis!</p>
        </section>
        <section class="formation" id="section3">
            <h2>Formation</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illo sed porro facere commodi? Minus deleniti quidem nisi, veniam minima obcaecati nostrum ducimus ab molestias veritatis doloribus asperiores, laboriosam blanditiis!</p>
        </section>
    