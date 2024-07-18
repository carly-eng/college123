<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Collège Jean</title>
    <link rel="stylesheet" href="style.css">
        <!-- responsive -->
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)"?v=5>
    <style>
        /* Animation d'ombre au survol */
        .service {
            transition: box-shadow 0.3s ease;
        }
        .service:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<script src="script.js"></script>
    <!-- HEADER OF THE SITE -->
    <nav>
        <div id="logo">
           <a href="index.php"><img src="img/logo.png" alt="log"></a> 
           <!-- <p style="Font-size:20px;">Bienvenue sur College Jean</p> -->
        </div>
       
        <div  onclick="afich()"; id="btn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>

        <div class="menu" id="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="propos.php">A propos</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <a class="bouton" style="display: inline;" href="login.php" class="connect">Connexion</a>

        </div>
  

    </nav>

    <!-- THE END OF THE HEADER -->

    <!-- BANNER -->
    <div class="banner">
        <div class="b1">
            <h1>Collège Jean</h1>
            <p style="text-align:center;">Excellence éducative depuis 1990.</p>
            <br>
            <a style="margin-left:35px;" class="bouton boutonnen" href="login.php">Connexion</a>
            <a class="bouton2" href="inscription.php">Inscription</a>
        </div>
        <div class="b2">
            <img src="img/f3.png" alt="Image Bannière">
        </div>
    </div>
    <!-- END BANNER -->

    <!-- ABOUT SECTION -->
    <div class="about">
        <div>
            <img src="img/zwazo.png" id="zwazo" alt="Logo Zwazo">
        </div>
        <div>
            <h1>À propos de nous</h1>
            <p>Bienvenue sur le site officiel du Collège Jean, un établissement éducatif dédié à l'excellence académique et au développement personnel de chaque élève.</p>
            <br>
            <p>Notre mission est de préparer les jeunes à devenir des citoyens responsables, éclairés et engagés. Nous croyons en l'excellence académique, le respect, l'innovation, et l'inclusion.</p>
            <br>
            <a class="bouton" href="propos.php">En savoir plus</a>
        </div>
    </div>
    <!-- END ABOUT SECTION -->

    <!-- OUR SERVICES -->
    <div class="container">
        <h1>Nos Services</h1>
        <div class="services">
            <div class="service">
                <img src="img/calendrier.jpg" alt="Service 1">
                <h3>Programme Académique</h3>
                <p>Un programme rigoureux qui prépare les élèves pour les défis de demain.</p>
            </div>
            <div class="service">
                <img src="img/culturel (1).jpg" alt="Service 2">
                <h3>Activités Sportives</h3>
                <p>Des sports variés pour promouvoir la santé et le travail d'équipe.</p>
            </div>
            <div class="service">
                <img src="img/spirituel.png" alt="Service 2">
                <h3>Activités Religieux</h3>
                <p>pour encourager la spiritualité au sein de notre communauté scolaire.</p>
            </div>
            <div class="service">
                <img src="img/musique.png" alt="Service 2">
                <h3>Activités Musiques</h3>
                <p> la musique à travers des cours et des performances inspirantes.</p>
            </div>
            <!-- <div class="service">
                <img src="img/zwazo.png" alt="Service 2">
                <h3>Activités Sportives</h3>
                <p>Des sports variés pour promouvoir la santé et le travail d'équipe.</p>
            </div> -->
            <div class="service">
                <img src="img/zwazo.png" alt="Service 2">
                <h3>Activités Sportives</h3>
                <p>Des sports variés pour promouvoir la santé et le travail d'équipe.</p>
            </div>

            <!-- <div class="service">
                <img src="img/culturel (1).png" alt="Service 3">
                <h3>Activités Culturelles</h3>
                <p>Des activités artistiques et culturelles pour élargir les horizons des élèves.</p>
            </div> -->
            <div class="service">
                <img src="img/orientation.webp" alt="Service 4">
                <h3>Orientation Professionnelle</h3>
                <p>Un accompagnement pour aider les élèves à choisir leur chemin professionnel.</p>
            </div>
            
            <!-- Deux nouveaux services -->
            <!-- <div class="service">
                <img src="img/service5.png" alt="Service 5">
                <h3>Service 5</h3>
                <p>Description du service 5.</p>
            </div>
            <div class="service">
                <img src="img/service6.png" alt="Service 6">
                <h3>Service 6</h3>
                <p>Description du service 6.</p>
            </div> -->
        </div>
    </div>
    <!-- END OUR SERVICES -->

    <!-- FOOTER -->
     <!-- FOOTER -->
     <footer>
            <p>&copy; Copyright college Jean, 2022</p>
            <br>
            <a href="#top">Retour en haut de la page</a>
         </footer>
         <!-- THE END OF THE FOOTER -->
    <!-- END FOOTER -->

</body>
</html>
