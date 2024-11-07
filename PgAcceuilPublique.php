<?php
// Inclusion de la connexion à la base de données et du gestionnaire des annonces
//require_once('connexion.php');
require_once('annonceManager.php');
require_once('annonce.class.php');
$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');


// Récupération des annonces
$annonceManager = new AnnonceManager($db);
$annonces = $annonceManager->afficherToutesLesAnnoncesPubliques();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - Annonces</title>
    <!-- Ajout de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Espace Annonces</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="PgAcceuilPublique.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pgconn.php">Connexion</a>
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center">Toutes les Annonces</h1>
        
        <div class="row">
            <?php
            // Affichage des annonces
            foreach ($annonces as $annonce) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($annonce->getDescription()) ?></h5>
                            <p class="card-text">Auteur : <?= htmlspecialchars($annonce->getAuteur()) ?></p>
                            <p class="card-text">Date : <?= htmlspecialchars($annonce->getDate()) ?></p>
                            <p class="card-text">Destinataire : <?= htmlspecialchars($annonce->getDestinataire() ?? "Public") ?></p>
                            <a href="#" class="btn btn-primary">Voir Détails</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Ajout des scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
