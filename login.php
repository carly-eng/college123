<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
        <!-- responsive -->
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)"?v=5>
</head>
<body class="adm-body kontak">
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
    <!-- FORM -->
    <div class="container-adm-log dash fom-kontak">
    <form action="traitement_login.php" method="post">
            <h1>Connexion</h1>
            <p>Si vous n'avez pas un compte,
                <a href="registration.php">Cliquez ici</a> pour vous inscrire.</p>
            <br><br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" autocomplete="off" required>
            
            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" autocomplete="off" required>
            
            <input type="submit" value="Connexion">
            <br><br>
            <a href="registration.php">Créer un nouveau compte</a>
        </form>
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </div>
    <!-- THE END OF THE FORM -->
    <!-- FOOTER -->
    <!-- FOOTER -->
    <footer>
            <p>&copy; Copyright college Jean, 2022</p>
            <br>
            <a href="#top">Retour en haut de la page</a>
         </footer>
         <!-- THE END OF THE FOOTER -->
</body>
</html>