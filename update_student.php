<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Suppression</title>
    <link rel="stylesheet" href="style.css">
        <!-- responsive -->
        <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)"?v=5>

    <style>
        .btn-confirmer {
            background-color:#FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-annuler {
            background-color:#FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 10px;
        }

        .btn-annuler:hover {
            background-color: rgba(255, 165, 0, 0.5); /* Rouge plus foncé au survol */
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
            background-color: rgba(255, 165, 0, 0.5); /* Rouge plus foncé au survol */
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
    </style>
</head>
<body class="adm-body">
    <!-- HEADER DU SITE -->
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/logo.png" alt="log"></a>
        </div>
        <div class="menu">
        <!-- <ul>
                <li><a class="bouton" href="create_etudiant_admin.php">Ajouter une inscription</a></li>
                <li><a class="bouton" href="read_students.php">Voir les inscriptions</a></li>
                <li><a class="bouton" href="select_student.php">Mettre à jour une inscription</a></li>
                <li><a class="bouton" href="delete_student.php">Supprimer une inscription</a></li>
            </ul> -->
            <a class="bouton2" style="display: inline;" href="select_student.php">Retour</a>
        
    
                
   



        </div>
    </nav>

    <?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $date_naissance = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_STRING);
    $vacation = filter_input(INPUT_POST, 'vacation', FILTER_SANITIZE_STRING);
    $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);

    $requete = $conn->prepare("UPDATE inscription_etudiant SET nom = ?, prenom = ?, date_naissance = ?, vacation = ?, sexe = ?, age = ?, classe = ?, telephone = ? WHERE id = ?");
    $requete->bind_param("ssssssisi", $nom, $prenom, $date_naissance, $vacation, $sexe, $age, $classe, $telephone, $id);

    if ($requete->execute()) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$requete = $conn->prepare("SELECT * FROM inscription_etudiant WHERE id = ?");
$requete->bind_param("i", $id);
$requete->execute();
$resultat = $requete->get_result();
$etudiant = $resultat->fetch_assoc();
?>




<div class="container-adm-log dash fom-kontak">
        <h2>Mettre à Jour le formulaire d'inscription</h2>
        <form action="update_student.php" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier cet étudiant ?');">
            <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required><br><br>

            <label for="date_naissance">Date de Naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $etudiant['date_naissance']; ?>" required><br><br>

            <label for="vacation">Vacation :</label>
            <select id="vacation" name="vacation" required>
                <option value="PM" <?php if ($etudiant['vacation'] == "PM") echo "selected"; ?>>PM</option>
                <option value="AM" <?php if ($etudiant['vacation'] == "AM") echo "selected"; ?>>AM</option>
            </select><br><br>

            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe" required>
                <option value="M" <?php if ($etudiant['sexe'] == "M") echo "selected"; ?>>Masculin</option>
                <option value="F" <?php if ($etudiant['sexe'] == "F") echo "selected"; ?>>Féminin</option>
            </select><br><br>

            <label for="age">Âge</label><br>
            <select id="age" name="age" required>
                <?php for ($i = 5; $i <= 30; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php if ($etudiant['age'] == $i) echo "selected"; ?>><?php echo $i; ?> Ans</option>
                <?php endfor; ?>
            </select><br><br>

            <label for="telephone">Téléphone</label><br>
            <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($etudiant['telephone']); ?>" pattern="[0-9]{8}" title="Numéro de téléphone doit contenir 8 chiffres" required><br><br>

            <label for="classe">Classe</label><br>
            <select id="classe" name="classe" required>
                <option value="Première année" <?php if ($etudiant['classe'] == "Première année") echo "selected"; ?>>Première année</option>
                <option value="Deuxième année" <?php if ($etudiant['classe'] == "Deuxième année") echo "selected"; ?>>Deuxième année</option>
                <option value="Troisième année" <?php if ($etudiant['classe'] == "Troisième année") echo "selected"; ?>>Troisième année</option>
                <option value="Quatrième année" <?php if ($etudiant['classe'] == "Quatrième année") echo "selected"; ?>>Quatrième année</option>
                <option value="Cinquième année" <?php if ($etudiant['classe'] == "Cinquième année") echo "selected"; ?>>Cinquième année</option>
                <option value="Sixième année" <?php if ($etudiant['classe'] == "Sixième année") echo "selected"; ?>>Sixième année</option>
                <option value="Septième année" <?php if ($etudiant['classe'] == "Septième année") echo "selected"; ?>>Septième année</option>
                <option value="Huitième année" <?php if ($etudiant['classe'] == "Huitième année") echo "selected"; ?>>Huitième année</option>
                <option value="Neuvième année" <?php if ($etudiant['classe'] == "Neuvième année") echo "selected"; ?>>Neuvième année</option>
                <option value="NS1" <?php if ($etudiant['classe'] == "NS1") echo "selected"; ?>>NS1</option>
                <option value="NS2" <?php if ($etudiant['classe'] == "NS2") echo "selected"; ?>>NS2</option>
                <option value="NS3" <?php if ($etudiant['classe'] == "NS3") echo "selected"; ?>>NS3</option>
                <option value="NS4" <?php if ($etudiant['classe'] == "NS4") echo "selected"; ?>>NS4</option>
            </select><br><br>

            <button type="submit">Mettre à jour</button>
        </form>
    </div>

    <footer>
        <p>&copy; Copyright nom de mon site, 2024</p>
        <br>
        <a href="#top">Retour en haut de la page</a>
    </footer>
</body>
</html>
