<?php
require_once("connection.php"); // Inclure le fichier pour la connexion à la base de données

// Informations de l'administrateur
$admin_email = 'carly@gmail.com';
$admin_password = 'carly1234';
$admin_nom = 'Admin';
$admin_prenom = 'User';

// Activer les rapports d'erreurs pour MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Vérifier si l'administrateur existe déjà
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE email = ?");
    if (!$stmt) {
        throw new Exception("Erreur de préparation de la requête SELECT : " . $conn->error);
    }
    $stmt->bind_param('s', $admin_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Administrateur n'existe pas, le créer
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, mot_passe, role) VALUES (?, ?, ?, ?, 'admin')");
        if (!$stmt) {
            throw new Exception("Erreur de préparation de la requête d'insertion : " . $conn->error);
        }
        $stmt->bind_param('ssss', $admin_nom, $admin_prenom, $admin_email, $hashed_password);
        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'exécution de la requête d'insertion : " . $stmt->error);
        }
        // echo "Administrateur créé avec succès.";
    } else {
        // echo "L'administrateur existe déjà.";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

$stmt->close();
$conn->close();
?>
