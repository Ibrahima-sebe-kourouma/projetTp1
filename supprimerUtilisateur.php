<?php
session_start();
require_once('utilisateurManager.php');
require_once('Utilisateur.class.php');
require_once('admin.class.php');
require_once('utilisateurSimple.class.php');

$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');
$utilisateurManager = new utilisateurManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Supprime l'utilisateur avec l'ID spécifié
    $utilisateurManager->supprimerUtilisateur($id);

    // Message de confirmation
    $successMessage = "Utilisateur supprimé avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Utilisateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Supprimer un Utilisateur</h2>
        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">ID de l'Utilisateur</label>
                <input type="number" class="form-control" id="id" name="id" required placeholder="Entrez l'ID de l'utilisateur à supprimer">
            </div>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
