

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
    <link rel="stylesheet" href="style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)">
</head>
<body class="adm-body kontak">
    <script src="script.js"></script>
    <!-- HEADER OF THE SITE -->
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/logo.png" alt="log"></a> 
        </div>
        
        <div onclick="afich()" id="btn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>

        <div class="menu" id="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="propos.php">À propos</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <a class="bouton" style="display: inline;" href="login.php" class="connect">Connexion</a>
        </div>
    </nav>
    <!-- THE END OF THE HEADER -->

    <!-- FORM -->
    <div class="container-adm-log dash fom-kontak">
        <h1>Contactez-nous</h1>


        
        <form action="contact.php" method="post">
        <?php
require_once("connection.php");

// Initialisation des variables
$name = $email = $message = "";
$email_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et échapper les valeurs du formulaire
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Vérifier si l'e-mail existe dans la base de données
    $query = "SELECT * FROM utilisateur WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Insérer le message dans la base de données
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Message envoyé avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Afficher les autres informations dans leurs champs respectifs
        $email_error = "vous n'etres pas un utilisateur. Veuillez vous connecter d'abord.";
    }

    $conn->close();
}
?>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" autocomplete="off" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" autocomplete="off" required>
            <span style="color: red;"><?php echo $email_error; ?></span>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" autocomplete="off" required><?php echo $message; ?></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
    <!-- THE END OF THE FORM -->

    <!-- FOOTER -->
    <footer>
        <p>&copy; Copyright college Jean, 2022</p>
        <br>
        <a href="#top">Retour en haut de la page</a>
    </footer>
    <!-- THE END OF THE FOOTER -->
</body>
</html>
