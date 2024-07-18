<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="adm-body">
    <nav>
        <!-- Votre navigation ici -->
    </nav>

    <div class="container-adm-log dash">
        <h1>Confirmation d'Inscription</h1>
        <?php if (isset($_SESSION['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
            <?php unset($_SESSION['success']); // Supprimer le message après l'affichage ?>
        <?php elseif (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
            <?php unset($_SESSION['error']); // Supprimer le message après l'affichage ?>
        <?php endif; ?>
        
        <p>Voulez-vous vous connecter maintenant ?</p>
        <form action="login.php" method="post" style="display:inline;">
            <button type="submit">Oui</button>
        </form>
        <br>
        <br>
        <form action="index.php" method="post" style="display:inline;">
            <button type="submit">Non</button>
        </form>
    </div>

<!-- END OF THE BANNER -->

     <!-- ABOUT PART -->
     <div class="about">
        <div>
            <img src="img/zwazo.png" id="zwazo" alt="zwazo">
        </div>
        <div>
            <h1>A propos de nous</h1>
            <p>Bienvenue sur le site officiel du Collège Jean, un établissement éducatif où l'excellence académique et le développement personnel de chaque élève sont au cœur de nos préoccupations. Depuis notre fondation, nous nous engageons à offrir une éducation de qualité, favorisant la curiosité intellectuelle, la créativité et le respect des valeurs humaines. </p>
            <br>
            <p>Notre Mission
            Au Collège Jean, notre mission est de préparer les jeunes à devenir des citoyens responsables, éclairés et engagés. Nous offrons un environnement stimulant où chaque élève peut s'épanouir et atteindre son plein potentiel.</p>
            <br>
            <p>Nos Valeurs
Nous croyons en :

L'excellence académique : Encourager les élèves à viser l'excellence dans toutes les disciplines.
Le respect et l'intégrité : Favoriser un climat de respect mutuel et d'honnêteté.
L'innovation : Intégrer les nouvelles technologies et méthodes pédagogiques pour enrichir l'apprentissage.
L'inclusion et la diversité : Accueillir et valoriser chaque individu, quelle que soit son origine.
Nos Programmes
Nous proposons une variété de programmes académiques et extrascolaires conçus pour développer les compétences intellectuelles, sociales et émotionnelles de nos élèves. Nos enseignants dévoués et passionnés travaillent en étroite collaboration avec les familles pour soutenir le parcours éducatif de chaque élève.

Rejoignez-nous au Collège Jean et découvrez un lieu où l'apprentissage est une aventure passionnante et enrichissante. Ensemble, construisons un avenir prometteur pour nos jeunes.

</p>
            <br>
            <a class="bouton" href="propos.php">En savoir plus</a>
        </div>
        
      </div>
      <!-- THE END OF THE ABOUT -->


      <!-- OUR SERVICES -->
       <div class="container">
        <br>
        <h1 style="text-align: center;">Nos services</h1>
            <div class="services">
                        <div class="service">
                            <img src="img/glob.png" alt="">
                            <br>
                            <h3>succursale 1</h3>
                            <p>Carrefour Thor 12 #13 B</p>
                        </div>

                        <div class="service">
                            <img src="img/glob.png" alt="">
                            <br>
                            <h3>succursale 1</h3>
                            <p>Petion ville  #13 B</p>
                        </div>
            
                <div class="service">
                <a href="login.php"><img src="img/load.jpg" alt="log"></a> 
                    <br>
                    <h3>connexion</h3>
                    <p>voulez vous connecter</p>
                   
                </div>

                <div class="service">
                    <!-- <img src="img/service.jpg" alt=""> -->
                  
           <a href="contact.php"><img src="img/send.png" alt="log"></a> 
        
                    <br>
                    <h3>College Jean</h3>
                    <p>vos Commentaires</p>
                </div>


        </div>


           
    
        
        
       <!-- THE END OF THE SERVICE -->
        <!-- FOOTER -->
        <footer>
            <p>&copy; Copyright nom de mon site, 2024</p>
            <br>
            <a href="#top">Retour en haut de la page</a>
         </footer>
         <!-- THE END OF THE FOOTER -->

</body>
</html>


