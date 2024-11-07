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
$annonceManager = new annonceManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $destinataire = $_POST['destinataire'];
    
    $annonce = new Annonce("1",$description,date('Y-m-d H:i:s'),$utilisateur->getNom(),$destinataire,);
    

    $annonceManager->ajouterAnnonce($annonce);

    header('Location: PgAcceuilPrive.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une Annonce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Publier une Annonce</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="description">Description de l'annonce</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="destinataire">Destinataire</label>
                <input type="text" class="form-control" id="destinataire" name="destinataire" required>
            </div>
            <button type="submit" class="btn btn-primary">Publier l'annonce</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
