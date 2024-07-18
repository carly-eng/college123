<?php

// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_passe = $_POST['mot_passe']; // À hacher avant d'insérer en production

    // Hachage du mot de passe (en production, utilisez password_hash())
    $mot_passe_hache = password_hash($mot_passe, PASSWORD_DEFAULT);

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root"; // Utilisateur de la base de données
    $password = ""; // Mot de passe de la base de données
    $dbname = "EtudiantInf"; // Nom de la base de données

    // Création de la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparation de la requête SQL
    $sql = "INSERT INTO utilisateur (nom, prenom, email, mot_passe) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bind_param("ssss", $nom, $prenom, $email, $mot_passe_hache);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Succès de l'insertion
        echo "Compte créé avec succès !";
    } else {
        // Erreur lors de l'insertion
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    // Fermeture du statement et de la connexion
    $stmt->close();
    $conn->close();
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: register.php");
    exit();
}
?>
