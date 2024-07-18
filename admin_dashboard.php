<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- <?php echo $_SESSION['nom']; ?> -->

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=2">
            <!-- responsive -->
            <link rel="stylesheet" href="mobile.css" media="screen and (max-width: 845px)"?v=5>
</head>
<body class="adm-body kontak">
    <!-- HEADER OF THE SITE -->
    <nav>
        <div id="logo">
           <a href="index.php"><img src="img/logo.png" alt="log"></a> 
        </div>
        <div class="menu">
    <ul style="width:20px;">
       <!-- <li><h2>Bienvenue, </h2></li> -->
        <!-- <li><a href="createstudentA.php">Ajouter un étudiant</a></li>
        <li><a href="read_students.php">Voir les étudiants</a></li>
        <li><a href="select_student.php">Mettre à jour un étudiant</a></li>
        <li><a href="delete_student.php">Supprimer un étudiant</a></li> -->
    </ul>
    <a class="bouton2" href="admin_logout.php">Se déconnecter</a>
            <!-- <a class="bouton" style="display: inline;" href="login.html">Connexion</a> -->
        </div>
    </nav>
    <!-- THE END OF THE HEADER -->
<!-- CONATAINER  -->
 <div class="container-adm-log dash1 fom-kontak">
 <h1>Gérer les inscriptions</h1>
 <ul >
        <li class="bouton2"><a href="create_etudiant_admin.php">Ajouter une inscription</a></li>
        <li class="bouton2"><a href="read_students.php">Voir les  inscriptions</a></li>
        <li class="bouton2"><a href="select_student.php">Mettre à jour une inscription</a></li>
        <li class="bouton2"><a href="delete_student.php">Supprimer une inscription</a></li>
    </ul>
 </div>
 <br><br><br><br><br>
       <!-- FOOTER -->
       <footer>
        <p>&copy; Copyright nom de mon site, 2024</p>
        <br>
        <a href="#top">Retour en haut de la page</a>
     </footer>
     <!-- THE END OF THE FOOTER -->

</body>
</html>