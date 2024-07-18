<?php
session_start(); // Démarrer la session en haut du fichier pour accéder aux messages de session
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)">
    <style>
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .error {
            border: 1px solid red;
        }
    </style>
</head>
<body class="adm-body kontak">
<script src="script.js"></script>
    <!-- HEADER OF THE SITE -->
    <nav>
        <div id="logo">
           <a href="index.php"><img src="img/logo.png" alt="logo"></a> 
           <!-- <p style="Font-size:20px;">Bienvenue sur College Jean</p> -->
        </div>
       
        <div onclick="afich()" id="btn">
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
        <form action="traitement_inscription.php" method="post">
            <h1>Créer un Compte</h1>
            <label for="txtnom">Nom</label><br>
            <input type="text" id="txtnom" name="txtnom" value="<?php echo isset($_SESSION['nom']) ? htmlspecialchars($_SESSION['nom']) : ''; ?>" autocomplete="off" required><br>
            
            <label for="txtprenom">Prénom</label><br>
            <input type="text" id="txtprenom" name="txtprenom" value="<?php echo isset($_SESSION['prenom']) ? htmlspecialchars($_SESSION['prenom']) : ''; ?>" autocomplete="off" required><br>
            
            <label for="txtemail">Email</label><br>
            <input type="email" id="txtemail" name="txtemail" class="<?php echo isset($_SESSION['email_error']) ? 'error' : ''; ?>" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" autocomplete="off" required><br>
            
            <label for="txtmot">Mot de passe</label><br>
            <input type="password" id="txtmot" name="txtmot" value="<?php echo isset($_SESSION['mot_passe']) ? htmlspecialchars($_SESSION['mot_passe']) : ''; ?>" autocomplete="off" required><br><br>
            
            <input type="submit" value="Inscription">
        </form>
        
        <!-- Afficher le message de confirmation ou d'erreur -->
        <?php if (isset($_SESSION['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_SESSION['success']); ?></p>
            <?php unset($_SESSION['success']); // Supprimer le message après l'affichage ?>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <p style="color: red;"><?php echo htmlspecialchars($_SESSION['error']); ?></p>
            <?php unset($_SESSION['error']); // Supprimer le message après l'affichage ?>
        <?php endif; ?>
    </div>
    <!-- THE END OF THE FORM -->

    <!-- FOOTER -->
    <footer>
        <p>&copy; Copyright College Jean, 2022</p>
        <br>
        <a href="#top">Retour en haut de la page</a>
    </footer>
    <!-- THE END OF THE FOOTER -->
</body>
</html>
