<?php
session_start();
require_once('annonceManager.php');
require_once('Annonce.class.php');
require_once('Utilisateur.class.php');
require_once('utilisateurManager.php');
require_once('utilisateurSimple.class.php');
require_once('admin.class.php');
$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');

if (!isset($_SESSION['utilisateur'])) {
    header('Location: Pgconn.php'); 
    exit();
}


$utilisateur = unserialize($_SESSION['utilisateur']); 
$utilisateurManager = new utilisateurManager($db);
$annonceManager = new annonceManager($db);


// Récupérer toutes les annonces
$annonces = $annonceManager->afficherToutesLesAnnonces();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Prive - Annonces</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Forum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><?= $utilisateur->getNom() ?> <?= $utilisateur->getPrenom() ?>   <?= $utilisateur->getTitre() ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pgannonce.php">Publier annonce</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pgconn.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Liste des Annonces</h2>

        <!-- Affichage des annonces -->
        <?php if (count($annonces) > 0) : ?>
            <div class="list-group">
                <?php foreach ($annonces as $annonce) : ?>
                    <div class="list-group-item">
                        <h5><?= htmlspecialchars($annonce->getDescription()); ?></h5>
                        <p><strong>Auteur:</strong> <?= htmlspecialchars($annonce->getAuteur()); ?></p>
                        <p><strong>Date:</strong> <?= htmlspecialchars($annonce->getDate()); ?></p>
                        <p><strong>Destinataire:</strong> <?= htmlspecialchars($annonce->getDestinataire()); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Aucune annonce disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <!-- Optional JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
