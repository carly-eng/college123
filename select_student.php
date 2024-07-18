<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit();
}
require_once("connection.php");

// Récupérer la liste de tous les étudiants
$requete = $conn->prepare("SELECT id, nom, prenom FROM inscription_etudiant");
$requete->execute();
$resultat = $requete->get_result();
?>



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
            /* color: #fff; */
            /* padding: 10px 0; */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            /* margin-right: 20px; */
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            /* padding: 10px 20px; */
        }

        nav ul li a:hover {
            /* background-color: #555; */
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

<!-- FORM -->
    <div  class="container-adm-log dash1 fom-kontak">
        <br><br>
     <!-- pati select -->
    <h1>Selectionner le formulaire à Modifier</h1>
    <br>
    <form action="update_student.php" method="get">
        <label for="etudiant">Étudiant :</label>
        <select id="etudiant" name="id" required>
            <?php while ($etudiant = $resultat->fetch_assoc()) : ?>
                <option value="<?php echo $etudiant['id']; ?>">
                    <?php echo $etudiant['nom'] . " " . $etudiant['prenom']. " " ; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <br>
        <button type="submit">Choisir</button>
         <!-- fen select -->
    </form>
</div>
<br><br><br><br><br>
 <!-- THE END OF THE FORM -->
       <!-- FOOTER -->
       <!-- FOOTER -->
       <footer>
            <p>&copy; Copyright college Jean, 2022</p>
            <br>
            <a href="#top">Retour en haut de la page</a>
         </footer>
         <!-- THE END OF THE FOOTER -->
     <!-- THE END OF THE FOOTER -->

</body>
</html>