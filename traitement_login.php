<?php
session_start();
require_once("connection.php"); // Inclure le fichier pour la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mot_passe = filter_input(INPUT_POST, 'mot_de_passe', FILTER_SANITIZE_STRING);

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_passe, $row['mot_passe'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Vérifier le rôle de l'utilisateur et rediriger en conséquence
            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: create_etudiant.php");
            }
            exit();
        } else {
            header("Location: login.php?error=Mot de passe incorrect");
            exit();
        }
    } else {
        header("Location: login.php?error=Aucun utilisateur trouvé avec cet email");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>
