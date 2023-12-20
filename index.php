<!-- nous avons essayer de faire les routes avec un fichier routes.php qui contient un tableau associatif 
et avec une redirection tel que celle la header("Location: index.php?route=login.php"); au lieu  header("Location:  ../views/login.php");
nous avons trouver une difficulter !!!
    
    <?php
// $routes = include('routes.php');
// $requestedRoute = $_GET['route'] ?? 'index';

// var_dump($requestedRoute);

// // Vérifiez si $routes est un tableau
// if (is_array($routes) && array_key_exists($requestedRoute, $routes)) {
//     $page = $routes[$requestedRoute];
//     $filePath = "views/$page";

//     // Assurez-vous que le fichier existe avant de l'inclure
//     if (file_exists($filePath)) {
//         include($filePath);
//     } else {
//         echo "Fichier non trouvé";
//     }
// } else {
//     echo "Route non valide";
// }
//?> -->
<div class="container_site">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" type="text/css" href="public/styles.css"> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>MOTO VIBE</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MOTO VIBE</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="views/login.php">Connexion</a></li>
                <li><a href="views/inscription.php">Inscription</a></li>
            </ul>
        </div>
    </div>
</nav>

<br><br>
<section class="hero">
    <div class="container">
        <h2>Bienvenue chez MOTO VIBE</h2>
        <p>Découvrez notre sélection de motos scooters et quads de qualité.</p>
        <a href="views/tousNosProduits.php" class="btn">Voir tous nos produits</a>
    </div>
</section>

<br><br>
</div>

<?php 
include 'public/footer.php';
?>
</body>
</html>