<?php
// Paramètres de connexion à la base de données
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "EtudiantInf"; 

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
