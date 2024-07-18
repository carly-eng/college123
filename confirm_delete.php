<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: alogin.php");
    exit();
}
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    // Récupérer les informations de l'étudiant
    $stmt = $conn->prepare("SELECT * FROM inscription_etudiant WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $etudiant = $result->fetch_assoc();
    } else {
        echo "Étudiant non trouvé.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Suppression</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .btn-confirmer {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-annuler {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }

        .btn-annuler:hover {
            background-color: rgba(255, 165, 0, 0.5); /* Orange plus foncé au survol */
        }

        /* Boutons de navigation */
        .bouton {
            background-color: #FFA500; /* Orange */
            color: black; /* Texte noir */
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .bouton:hover {
            background-color: rgba(255, 165, 0, 0.5); /* Orange plus foncé au survol */
        }

        /* Menu de navigation */
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        /* Conteneur transparent orange */
        .container-transparent-orange {
            background-color: rgba(255, 165, 0, 0.5); /* Orange transparent */
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        /* Tableau des informations */
        .info-etudiant table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-etudiant th, .info-etudiant td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }

        .info-etudiant th {
            background-color: #FFA500;
            color: white;
        }
    </style>
</head>
<body class="adm-body">
    <!-- HEADER DU SITE -->
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
        <div class="menu">
            <!-- <ul>
                <li><a class="bouton" href="create_etudiant_admin.php">Ajouter une inscription</a></li>
                <li><a class="bouton" href="read_students.php">Voir les inscriptions</a></li>
                <li><a class="bouton" href="select_student.php">Mettre à jour une inscription</a></li>
                <li><a class="bouton" href="delete_student.php">Supprimer une inscription</a></li>
            </ul> -->
            <a class="bouton2" style="display: inline;" href="delete_student.php">Retour</a>
        </div>
    </nav>
    <!-- FIN DU HEADER -->

    <!-- FORMULAIRE DE CONFIRMATION -->
    <div class="container-adm-log dash">
        <h1>Confirmation de Suppression</h1>
        <br>
        <?php if (isset($etudiant)): ?>
            <div class="container-transparent-orange">
                <div class="info-etudiant">
                    <table>
                        <tr><th>Code:</th><td><?php echo $etudiant['code_etudiant']; ?></td></tr>
                        <tr><th>Nom:</th><td><?php echo $etudiant['nom']; ?></td></tr>
                        <tr><th>Prénom:</th><td><?php echo $etudiant['prenom']; ?></td></tr>
                        <tr><th>Date de Naissance:</th><td><?php echo $etudiant['date_naissance']; ?></td></tr>
                        <tr><th>Vacation:</th><td><?php echo $etudiant['vacation']; ?></td></tr>
                        <tr><th>Sexe:</th><td><?php echo $etudiant['sexe']; ?></td></tr>
                        <tr><th>Classe:</th><td><?php echo $etudiant['classe']; ?></td></tr>
                        
                        <tr><th>Age:</th><td><?php echo $etudiant['age']; ?></td></tr>
                        <tr><th>Téléphone:</th><td><?php echo $etudiant['telephone']; ?></td></tr>
                    </table>
                </div>
                <br>
                <form action="process_delete.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?');">
                    <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">
                    <button type="submit" class="btn-confirmer">Confirmer la Suppression</button>
                </form>
                <br>
                <form action="read_students.php">
                    <button type="submit" class="btn-annuler">Annuler</button>
                </form>
            </div>
        <?php else: ?>
            <p>Étudiant non trouvé.</p>
        <?php endif; ?>
    </div>
    <!-- FIN DU FORMULAIRE DE CONFIRMATION -->

    <!-- FOOTER -->
    <footer>
        <p>&copy; Droits d'auteur de votre site, 2024</p>
    </footer>
    <!-- FIN DU FOOTER -->
</body>
</html>
