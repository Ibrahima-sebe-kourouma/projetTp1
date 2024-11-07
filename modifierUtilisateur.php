<?php
session_start();
require_once('utilisateurManager.php');
require_once('Utilisateur.class.php');
require_once('admin.class.php');
require_once('utilisateurSimple.class.php');

$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');
$utilisateurManager = new utilisateurManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $statut = $_POST['statut'];
    $mdp = $_POST['mdp'];

    // Créer un nouvel objet Utilisateur avec les données du formulaire
    $utilisateur = new Utilisateur($id, $nom, $prenom, $age, $mdp);
    $utilisateur->setTitre($statut);

    // Modifier l'utilisateur dans la base de données
    $utilisateurManager->modifierUtilisateur($utilisateur);

    // Message de confirmation
    $successMessage = "Utilisateur modifié avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un Utilisateur</h2>
        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">ID de l'utilisateur</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="age">Âge</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="statut">Statut</label>
                <select class="form-control" id="statut" name="statut" required>
                    <option value="admin">Admin</option>
                    <option value="utilisateur">Utilisateur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" required>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
