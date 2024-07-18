<?php
// Commencez toujours votre fichier PHP par session_start() avant tout HTML
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Suppression</title>
    <link rel="stylesheet" href="style.css">
    <!-- responsive -->
    <!-- responsive -->
    <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)"?v=5>
    <style>
        .btn-confirmer, .btn-annuler {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-annuler:hover {
            background-color: rgba(255, 165, 0, 0.5); /* Orange plus foncé au survol */
        }

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

        nav {
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

        .container-transparent-orange {
            background-color: rgba(255, 165, 0, 0.5); /* Orange transparent */
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #FFA500;
            color: white;
        }

        @media screen and (max-width: 845px) {
            .container-adm-log {
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
                padding: 5px;
            }

            nav ul li {
                display: block;
                margin: 10px 0;
            }

            nav ul li a {
                display: block;
                margin: 5px 0;
            }

            .btn-confirmer, .btn-annuler, .bouton {
                padding: 5px 10px;
                margin: 5px 0;
            }
        }
    </style>
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

<!-- FORM -->
 <br>
 <br>
 <br>
 <
<div class="container-adm-log dash1 tablo">
    <!-- partie recherche -->
    <div class="container-transparent-orange tabloid">
        <?php
        $requete = "SELECT * FROM inscription_etudiant";
        $resultat = $conn->query($requete);

        if ($resultat->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Code Étudiant</th><th>Nom</th><th>Prénom</th><th>Date de Naissance</th><th>Vacation</th><th>Sexe</th><th>Age</th><th>Classe</th><th>Téléphone</th></tr>";
            while ($row = $resultat->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['code_etudiant'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['date_naissance'] . "</td>";
                echo "<td>" . $row['vacation'] . "</td>";
                echo "<td>" . $row['sexe'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['classe'] . "</td>";
                echo "<td>" . $row['telephone'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Aucun étudiant trouvé.";
        }
        ?>
    </div>
    <!-- fin partie recherche -->
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
