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
            /* background-color: #333; */
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
<body class="adm-body kontak">
<script src="script.js"></script>
    <!-- HEADER OF THE SITE -->
    <nav>
        <div id="logo">
           <a href="index.php"><img src="img/logo.png" alt="log"></a> 
           <!-- <p style="Font-size:20px;">Bienvenue sur College Jean</p> -->
        </div>
       
        <div  onclick="afich()"; id="btn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>

          <div class="menu menuC" id="menu">
        <ul>
            <li><a class="bouton" href="create_etudiant_admin.php">Ajouter une inscription</a></li>
            <li><a class="bouton" href="read_students.php">Voir les inscriptions</a></li>
            <li><a class="bouton" href="select_student.php">Mettre à jour une inscription</a></li>
            <li><a class="bouton" href="delete_student.php">Supprimer une inscription</a></li>
        </ul>
        <a class="bouton" style="display: inline;" href="login.php" class="connect">Connexion</a>
    </div>
  

    </nav>

    <!-- THE END OF THE HEADER -->
    <?php
session_start();

require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $date_naissance = $_POST['date_naissance']; // Utilisation directe car le format est déjà valide
    $vacation = filter_input(INPUT_POST, 'vacation', FILTER_SANITIZE_STRING);
    $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_NUMBER_INT);
    $classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING); // Utilisation de FILTER_SANITIZE_STRING pour classe

    // Générer le code étudiant (simplifié pour l'exemple)
    $codeEtudiant = " ". mt_rand(0,15) . "-". "CJ-ETUD-" . mt_rand(100, 500) ."-". $nom;

    $requete = $conn->prepare("INSERT INTO inscription_etudiant (code_etudiant, nom, prenom, date_naissance, vacation, sexe, age, telephone, classe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $requete->bind_param("ssssssiss", $codeEtudiant, $nom, $prenom, $date_naissance, $vacation, $sexe, $age, $telephone, $classe);

    if ($requete->execute()) {
        echo "Étudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'étudiant : " . $requete->error;
    }
}
?>
    <!-- FORMULAIRE -->
    <div class="container-adm-log dash fom-kontak">
        <form method="POST" action="create_etudiant_admin.php">
            <h1>Formulaire d'Inscription </h1>
           
            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom</label><br>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="date_naissance">Date de Naissance</label><br>
            <input type="date" id="date_naissance" name="date_naissance"  max="2021-01-01" required><br><br>

            <label for="vacation">Vacation</label><br>
            <select id="vacation" name="vacation" required>
                <option value="PM">PM</option>
                <option value="AM">AM</option>
            </select><br><br>

            <label for="sexe">Sexe</label><br>
            <select id="sexe" name="sexe" required>
                <option value="Masculin">Masculin</option>
                <option value="Féminin">Féminin</option>
                <option value="Autre">Autre</option>
            </select><br><br>

            <label for="age">Âge</label><br>
            <select id="age" name="age" required>
                <?php for ($i = 5; $i <= 30; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Ans</option>
                <?php endfor; ?>
            </select><br><br>

            <label for="telephone">Téléphone</label><br>
            <input type="text" id="telephone" name="telephone" pattern="[0-9]{8}" title="Numéro de téléphone doit contenir 8 chiffres" required><br><br>

            <label for="classe">Classe</label><br>
            <select id="classe" name="classe" required>
                <option value="Première année">Première année</option>
                <option value="Deuxième année">Deuxième année</option>
                <option value="Troisième année">Troisième année</option>
                <option value="Quatrième année">Quatrième année</option>
                <option value="Cinquième année">Cinquième année</option>
                <option value="Sixième année">Sixième année</option>
                <option value="Septième année">Septième année</option>
                <option value="Huitième année">Huitième année</option>
                <option value="Neuvième année">Neuvième année</option>
                <option value="NS1">NS1</option>
                <option value="NS2">NS2</option>
                <option value="NS3">NS3</option>
                <option value="NS4">NS4</option>
            </select><br><br>

            <input type="submit" value="Inscrire">
        </form>
    </div>
    <!-- FIN DU FORMULAIRE -->

    <!-- PIED DE PAGE -->
    <footer>
        <p>&copy; college Jean 2023</p>
        <br>
        <a href="#top">Retour en haut de la page</a>
    </footer>
    <!-- FIN DU PIED DE PAGE -->
</body>
</html>
