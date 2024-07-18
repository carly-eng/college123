<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: alogin.php");
    exit();
}
require_once("connection.php");

// Récupérer tous les étudiants
$requete = "SELECT * FROM inscription_etudiant";
$resultat = $conn->query($requete);
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

    <!-- FORMULAIRE DE SUPPRESSION -->
    <div class="container-adm-log dash1     fom-kontak">
        <br><br>
        <h1>Supprimer un formulaire</h1>
        <br>
        <form action="confirm_delete.php" method="post">
            <label for="id">Sélectionner un formulaire :</label>
            <select id="id" name="id" required>
                <?php while ($row = $resultat->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nom'] . " " . $row['prenom']; ?></option>
                <?php } ?>
            </select><br><br>

            <button type="submit">Supprimer</button>
        </form>
    </div>
    <br><br><br><br><br>
    <!-- FIN DU FORMULAIRE DE SUPPRESSION -->

     <!-- FOOTER -->
     <footer>
            <p>&copy; Copyright college Jean, 2022</p>
            <br>
            <a href="#top">Retour en haut de la page</a>
         </footer>
         <!-- THE END OF THE FOOTER -->
</body>
</html>
