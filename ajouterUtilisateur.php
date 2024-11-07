<?php
session_start();
require_once('utilisateurManager.php');
require_once('Utilisateur.class.php');
require_once('admin.class.php');
require_once('utilisateurSimple.class.php');

$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');
$utilisateurManager = new utilisateurManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $titre = $_POST['statut'];
    $mdp = $_POST['mdp'];

    // Création de l'utilisateur selon le statut choisi
    if ($titre === 'admin') {
        $utilisateur = new Admin(null, $nom, $prenom, $age, $mdp);
    } else {
        $utilisateur = new utilisateurSimple(null, $nom, $prenom, $age,$mdp);
    }

    // Ajouter l'utilisateur dans la base de données
    $utilisateurManager->ajouterUtilisateur($utilisateur);

    // Message de confirmation
    $successMessage = "Utilisateur ajouté avec succès !";
    header('Location: Pgadmin.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter un Utilisateur</h2>
        <?php if (isset($successMessage)): ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
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
                    <option value="utilisateur">Utilisateur Simple</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de Passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
