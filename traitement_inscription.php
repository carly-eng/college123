<?php
session_start();
require_once("connection.php"); // Inclure le fichier pour la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs du formulaire
    $nom = filter_input(INPUT_POST, 'txtnom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'txtprenom', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'txtemail', FILTER_SANITIZE_EMAIL);
    $mot_passe = $_POST['txtmot'];

    // Stocker les valeurs dans les variables de session
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mot_passe'] = $mot_passe;

    // Vérifier si l'email existe déjà
    $stmt = $conn->prepare("SELECT email FROM utilisateur WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // L'email existe déjà
            $_SESSION['error'] = "Vous ne pouvez pas utiliser cet email.";
            $stmt->close();
            header("Location: registration.php?email_error=1");
            exit();
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Erreur dans la requête : " . $conn->error;
        header("Location: registration.php");
        exit();
    }

    // Hacher le mot de passe
    $mot_passe_hache = password_hash($mot_passe, PASSWORD_DEFAULT);

    // Préparer la requête d'insertion SQL
    $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_passe) VALUES (?, ?, ?, ?)");
    
    // Vérifier si la préparation de la requête a réussi
    if ($stmt) {
        $stmt->bind_param("ssss", $nom, $prenom, $email, $mot_passe_hache);

        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            $_SESSION['success'] = "Inscription réussie ! Vous pouvez maintenant vous connecter avec votre email et mot de passe.";
            unset($_SESSION['nom']);
            unset($_SESSION['prenom']);
            unset($_SESSION['mot_passe']);
        } else {
            $_SESSION['error'] = "Erreur lors de l'inscription : " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
    } else {
        $_SESSION['error'] = "Erreur dans la requête : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    $_SESSION['error'] = "Méthode de requête invalide.";
}

// Rediriger l'utilisateur vers la page de confirmation
header("Location: confirmation.php");
exit();
?>
