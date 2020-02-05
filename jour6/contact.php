<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Services</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="nav-container">
            <a href="index.html" class="nav-link">Accueil</a>
            <a href="services.html" class="nav-link">Services</a>
            <a href="contact.html" class="nav-link">Contact</a>
        </nav>
    </header>
    
    <main>
        <section class="description">
            <h1>Contactez Nous</h1>
            <div class="container">
                <div class="colonne">
                    <form id="contact" action="#contact" method="POST">
                        <input type="text" name="nom" placeholder="entrez votre nom">
                        <input type="email" name="email" placeholder="entrez votre email">
                        <input type="text-area" cols="80" row="8" placeholder="entrez votre message">
                        <button type="submit">Envoyez Votre Message></button>
                    </form>
                </div>
                <div class="colonne">
                    <h3>Adresse</h3>
                    <p>54 Elm Street<br>
                    750045 Washington<br>
                    </p>
                    <h3>Téléphone</h3>
                    <p>0345 5645 8769</p>
                    <h3>email</h3>
                    <p>freddy@griffesdelanuit.com</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem natus iste quisquam quibusdam magnam sint cumque debitis ratione, aperiam amet hic odit fugiat ad, explicabo ipsum optio! Eos, velit necessitatibus.</p>
                      
                </div>
            </div> 
        </section>
    </main>

    <footer>
        <p>Tous droits réservés</p>     
    </footer>
</body>
</html>