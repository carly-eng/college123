<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: alogin.php");
    exit();
}
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    $requete = $conn->prepare("DELETE FROM inscription_etudiant WHERE id = ?");
    $requete->bind_param("i", $id);

    if ($requete->execute()) {
        $_SESSION['success'] = "Suppression réussie.";
        header("Location: delete_student.php");
        exit();
    } else {
        $_SESSION['error'] = "Erreur lors de la suppression de l'étudiant : " . $conn->error;
        header("Location: delete_student.php");
        exit();
    }
} else {
    header("Location: delete_student.php");
    exit();
}
?>
